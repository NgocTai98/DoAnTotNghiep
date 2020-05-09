<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }
    // public function postLogin(LoginRequest $r){
    //     if(User::where('email',$r->email)->where('password',$r->password)->count()>0)
    //     {
    //         // $level = User::where('email',$r->email)->where('password',$r->password)->get();
    //         // dd($level);
    //         session()->put('email',$r->email);
    //         session()->put('abc', 'scasd');
    //         // session()->put(['email', 'password'],[$r->email, $r->password]);
    //        return redirect('admin');
    //     }
    //     else {
    //        return redirect('login')->with('thongbao','Tài khoản hoặc mật khẩu không chính xác !')->withInput();
    //     }
        
    // }

    public function postLogin(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        
        if (Auth::attempt($credentials)) {
            // Authentication passed...

            return redirect('admin');
        }
        return redirect('login')->with('thongbao','Tài khoản hoặc mật khẩu không chính xác !')->withInput();
        
    }
    public function getLogout(){
        Auth::logout();
        return redirect('login');
    }
}
