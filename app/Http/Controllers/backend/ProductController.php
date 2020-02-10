<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\models\product;
use App\models\category;
use App\models\attribute;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function getListProduct(){       
        $data['products'] = product::paginate(4);
        return view('backend.product.listproduct',$data);
    }

    public function getAddProduct(){
        $data['category'] = category::all();
        return view('backend.product.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $r){
        return redirect('/admin/product')->with('thongbao','Đã thêm thành công');
    }

    public function getEditProduct(){
        return view('backend.product.editproduct');
    }
    public function postEditProduct(EditProductRequest $r){
        return redirect('/admin/product')->with('thongbao','Đã Sửa thành công');
    }

    public function getAttr(){
        $data['attrs'] = attribute::all();
        return view('backend.product.attr',$data);
    }
    public function getEditAttr(){
        return view('backend.product.editattr');
    }
    public function getEditValueAttr(){
        return view('backend.product.editvalue');
    }
    public function getAddVariant(){
        return view('backend.product.addvariant');
    }
    public function getEditVariant(){
        return view('backend.product.editvariant');
    }
}
