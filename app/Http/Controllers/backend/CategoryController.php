<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getListCategory()
    {
        return view('backend.category.category');
    }
    public function getEditCategory()
    {
        return view('backend.category.editcategory');
    }
   
}
