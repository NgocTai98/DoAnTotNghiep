<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\models\attribute;
use App\models\category;
use App\models\product;
use App\models\values;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getShop(request $r){
        if ($r->category) {
            $data['products']=category::find($r->category)->product()->where('img','<>','no-img.jpg')->paginate(12);
        }
        else if($r->start){
            $data['products']=product::whereBetween('price',[$r->start,$r->end])->where('img','<>','no-img.jpg')->paginate(12);

        }
        else if($r->value){
            $data['products']=values::find($r->value)->product()->where('img','<>','no-img.jpg')->paginate(12);

        }
        else{
            $data['products']=product::where('img','<>','no-img.jpg')->paginate(12);

        }
        $data['attrs'] = attribute::all();
        $data['category'] = category::all();
        return view('frontend.product.shop',$data);
        
    }
    public function getDetail($id){
        $data['product'] = product::find($id);
        $data['product_new']=product::where('img','<>','no-img.jpg')->orderby('created_at','DESC')->take(4)->get();
        return view('frontend.product.detail', $data);
    }
}
