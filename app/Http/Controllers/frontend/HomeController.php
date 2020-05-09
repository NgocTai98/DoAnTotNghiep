<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\sendMailRequest;
use App\models\members;
use App\models\product;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function getIndex(){
        $data['product_fe']=product::where('featured',1)->where('img','<>','no-img.jpg')->where('state',1)->take(4)->get();
        $data['product_new']=product::where('img','<>','no-img.jpg')->where('state',1)->orderby('created_at','DESC')->take(8)->get();
       return view('frontend.index',$data);
        
    }
    public function getContact(){
        return view('frontend.contact');
    }
    public function getAbout(){
        return view('frontend.about');
    }
    function sendMail(sendMailRequest $r){
      
       $adv = new members();
       $adv->email = $r->email;
       $adv->password = 'default';
       $adv->save();
       return redirect()->back()->with('thongbao', 'Đã đăng ký thành công');       
    }
    public function getLogin(){
        return view('frontend.login.login');
    }
    public function postLogin(Request $r){
      if (members::where('email', $r->email)->where('password', $r->password)->count() > 0) {
        // session()->put('email',$r->email);
        return redirect('');
      } else {
          return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác !')->withInput();
      }
      
    }
    public function getRegister(){
        return view('frontend.login.register');
    }
    public function postRegister(Request $r){
        $member = new members();
        $member->email = $r->email;
        $member->password = $r->password;
        $member->username = $r->username;
        $member->phone = $r->phone;
        $member->address = $r->address;
        $member->save();
        return redirect('');
    }
}
