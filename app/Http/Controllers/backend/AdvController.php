<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\advMail;

class AdvController extends Controller
{
    public function Adv(){
        $data['members'] = members::paginate(10);
        $data['total'] = members::count();
        return view('backend.adv', $data);
    }
    public function postAdv(Request $r){
        $data= $r->email;
        $adv = members::all();
        foreach ($adv  as $value) {
            Mail::to($value)->send(new advMail($data));
        }
        return redirect()->back()->with('thongbao', 'Đã gửi email');
    }
}
