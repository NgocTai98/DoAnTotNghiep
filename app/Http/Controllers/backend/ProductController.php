<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\model\product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function getListProduct(){
        $data['product'] = product::paginate(4);
        return view('backend.product.listproduct',$data);
    }

    public function getAddProduct(){
        return view('backend.product.addproduct');
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
        return view('backend.product.attr');
    }
    public function getEditAttr(){
        return view('backend.product.editattr');
    }
    public function getEditValue(){
        return view('backend.product.editvalue');
    }
    public function getAddVariant(){
        return view('backend.product.addvariant');
    }
    public function getEditVariant(){
        return view('backend.product.editvariant');
    }
}
