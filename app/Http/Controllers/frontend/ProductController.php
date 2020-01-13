<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getShop(){
        return view('frontend.product.shop');
    }
    public function getDetail(){
        return view('frontend.product.detail');
    }
}
