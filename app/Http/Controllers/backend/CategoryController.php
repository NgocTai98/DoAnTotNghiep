<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function getListCategory()
    {
        $data['category'] = category::all();
        return view('backend.category.category',$data);
    }
    public function postAddCategory(CategoryRequest $r){
        $cate=new Category;
        $cate->name=$r->name;
        $cate->slug = Str::slug($r->name, '-');
        $cate->parent=$r->category;
        $cate->save();
        return redirect()->back()->with('thongbao','Đã thêm thành công');
    }
    public function getEditCategory()
    {
        return view('backend.category.editcategory');
    }
   
}
