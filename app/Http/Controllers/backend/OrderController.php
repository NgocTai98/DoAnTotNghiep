<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder(){
        $data['customer'] = customer::where('state',0)->orderby('created_at', 'DESC')->paginate(5);
        return view('backend.order.order', $data);
    }
    public function getDetailOrder($id){
        $data['customer'] = customer::find($id);
        return view('backend.order.detailorder', $data);
    }
    public function activeOrder($id){
       $customer = customer::find($id);
       $customer->state = 1;
       $customer->save();
       return redirect('/admin/order')->with('thongbao','Đơn hàng đã được xử lý thành công');
        
    }
    public function getOrderProcessed(){
        $data['customer'] = customer::where('state',1)->orderby('updated_at', 'DESC')->paginate(5);
        return view('backend.order.orderprocessed', $data);
    }
}
