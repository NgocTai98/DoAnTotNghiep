<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart(){
        return view('frontend.cart.cart');
    }
    public function getCheckout(){
        return view('frontend.cart.checkout');
    }
    public function getComplete(){
        return view('frontend.cart.complete');
    }
}
