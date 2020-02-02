<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryRequest;
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
       
        $cate=new category;
        $cate->name=$r->name;
        // $cate->slug = Str::slug($r->name, '-');
        $cate->parent=$r->category;
        $cate->save();
        return redirect()->back()->with('thongbao','Đã thêm thành công');
    }
    public function getEditCategory($idCate)
    {
        $data['category']=category::all();
        $data['cate']=category::find($idCate);
        return view('backend.category.editcategory',$data);
    }
    function postEditCategory($idCate, EditCategoryRequest $r){
        $category = category::find($idCate);
        $category->name = $r->name;
        $category->parent = $r->parent;
        $category->save();

        return redirect()->back()->with('thongbao','Đã sửa thành công');
    }
    function delCategory($idCate)
    {
        $category = category::destroy($idCate);
        return redirect()->back()->with('thongbao','Đã xóa thành công');
    }
   
}
