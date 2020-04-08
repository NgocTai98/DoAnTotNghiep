<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\sendMailRequest;
use App\models\adv;
use App\models\product;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function getIndex(){
        $data['product_fe']=product::where('featured',1)->where('img','<>','no-img.jpg')->take(4)->get();
        $data['product_new']=product::where('img','<>','no-img.jpg')->orderby('created_at','DESC')->take(8)->get();
       return view('frontend.index',$data);
        
    }
    public function getContact(){
        return view('frontend.contact');
    }
    public function getAbout(){
        return view('frontend.about');
    }
    function sendMail(sendMailRequest $r){
      
       $adv = new adv();
       $adv->email = $r->email;
       $adv->save();
       return redirect()->back()->with('thongbao', 'Đã đăng ký thành công');       
    }
}
