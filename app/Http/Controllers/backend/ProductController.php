<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddAttrRequest;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\AddValueRequest;
use App\Http\Requests\EditAttrRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\EditValueRequest;
use App\models\product;
use App\models\category;
use App\models\attribute;
use App\models\values;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function getListProduct(){       
        $data['products'] = product::paginate(4);
        return view('backend.product.listproduct',$data);
    }

    public function getAddProduct(){
        $data['category'] = category::all();
        $data['attrs'] = attribute::all();
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
    public function postAddAttr(AddAttrRequest $r){
       echo $r->attr_name;
    }

    public function getEditAttr($id){
        $data['attr'] = attribute::find($id);
        return view('backend.product.editattr',$data);
    }
    public function postEditAttr(EditAttrRequest $r, $id){
       
    }


    public function postAddValue(AddValueRequest $r){
        
    }
    public function getEditValueAttr($id){
        $data['value'] = values::find($id);
        return view('backend.product.editvalue',$data);
    }
    public function postEditValueAttr(EditValueRequest $r ,$id){
        
    }

    public function getAddVariant(){
        return view('backend.product.addvariant');
    }
    public function getEditVariant(){
        return view('backend.product.editvariant');
    }
}
