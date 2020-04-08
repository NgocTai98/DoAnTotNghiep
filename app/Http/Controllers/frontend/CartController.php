<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\models\attr;
use App\models\customer;
use App\models\order;
use App\models\product;
use Illuminate\Http\Request;
use App\Mail\OrderMail;

use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function getAddCart(Request $r){
        $product = product::find($r->id_product);
        Cart::add([
         'id' => $product->product_code,
         'name' => $product->name,
         'qty' => $r->quantity,
         'price' =>getPrice($product,$r->attr),
         'weight' => 550,
         'options' => ['img' => $product->img, 'attr'=>$r->attr]]);
         return redirect('/cart');
    }
    public function getCart(){
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0,'',',');
        return view('frontend.cart.cart', $data);
    }
    public function getDelCart($id){
       Cart::remove($id);
       return redirect()->back();
    }
    public function getUpdateCart($rowId, $qty){
        Cart::update($rowId, $qty);       
     }
    public function getCheckout(){
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0,'',',');
        return view('frontend.cart.checkout', $data);
    }
    public function postCheckout(CheckoutRequest $r){
     $customer = new customer();
     $customer->full_name = $r->name;
     $customer->address = $r->address;
     $customer->email = $r->email;
     $customer->phone = $r->phone;
     $customer->total = Cart::total(0,'','');
     $customer->state = 0;
     $customer->save();

     foreach (Cart::content() as $product) {
        $order = new order();
        $order->name = $product->name;
        $order->price = $product->price;
        $order->quantity = $product->qty;
        $order->img = $product->options->img;
        $order->customer_id = $customer->id;
        $order->save();

        foreach ($product->options->attr as $key => $value) {
            $attr = new attr();
            $attr->name = $key;
            $attr->value = $value;
            $attr->order_id = $order->id;
            $attr->save();
        }       
     }

     //sendmail
        $data = array(
            'email' => $r->email,
            'name' =>$r->name,
            'address' => $r->address,
            'phone' =>$r->phone, 
            'product' => Cart::content(),
            'total' => Cart::total(0,'','')
        );
        Mail::to($r->email)->send(new OrderMail($data));
        
     Cart::destroy();
     return redirect('/cart/complete/'.$customer->id);
     
    }
    public function getComplete($id){
        $data['customer'] = customer::find($id);
        return view('frontend.cart.complete', $data);
    }

    public function email(){
        return view('frontend.email');
    }
}
