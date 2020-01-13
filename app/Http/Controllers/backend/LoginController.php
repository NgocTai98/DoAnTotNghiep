<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }
    public function postLogin(LoginRequest $r){
        if($r->email=='admin@gmail.com' && $r->password=='123456')
        {
            session()->put('email',$r->email);
           return redirect('admin');
        }
        else {
           return redirect('login')->withInput();
        }
        
    }
    public function getLogout(){
        session()->forget('email');
        return redirect('login');
    }
}
