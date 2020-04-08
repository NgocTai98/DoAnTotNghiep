<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\adv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\advMail;

class AdvController extends Controller
{
    public function Adv(){
        return view('backend.adv');
    }
    public function postAdv(Request $r){
        $data= $r->email;
        $adv = adv::all();
        foreach ($adv  as $value) {
            Mail::to($value)->send(new advMail($data));
        }
        return redirect()->back()->with('thongbao', 'Đã gửi email');
    }
}
