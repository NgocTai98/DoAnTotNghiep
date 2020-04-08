<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }
    public function postLogin(LoginRequest $r){
        if(User::where('email',$r->email)->where('password',$r->password)->count()>0)
        {
            session()->put('email',$r->email);
            // $level = User::where('email',$r->email)->where('password',$r->password)->take(1);
            // session()->put('level',$level);
           return redirect('admin');
        }
        else {
           return redirect('login')->with('thongbao','Tài khoản hoặc mật khẩu không chính xác !')->withInput();
        }
        
    }
    public function getLogout(){
        session()->forget('email');
        return redirect('login');
    }
}
