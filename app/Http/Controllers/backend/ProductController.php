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
use Illuminate\Support\Str;


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
        // $pro = new product();
        // $pro->category_id = $r->category;
        // $pro->name = $r->product_name;
        // $pro->product_code = $r->product_code;
        // $pro->price = $r->product_price;
        // $pro->state = $r->product_state;
        // $pro->info = $r->info;
        // $pro->describe = $r->description;
        // $pro->info = $r->info;
        // if ($r->hasFile('product_img')) {
        //     $file = $r->product_img;
        //     $fileName = Str::random(9).'.'.$file->getClientOriginalExtension();
        //     $pro->img = $fileName;
        //     $file->move('/public/backend/img',$fileName);
            
        // }else {
        //     $pro->img = 'no-img.jpg';
        // }

        // return redirect('/admin/product')->with('thongbao','Đã thêm thành công');
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
       $attr = new attribute();
       $attr->name = $r->attr_name;
       $attr->save();
       return redirect()->back()->with('thongbao', 'Đã thêm thành công thuộc tính:'.$r->attr_name);
    }

    public function getEditAttr($id){
        $data['attr'] = attribute::find($id);
        return view('backend.product.editattr',$data);
    }
    public function postEditAttr(EditAttrRequest $r, $id){
        $attr = attribute::find($id);
        $attr->name = $r->edit_attr;
        $attr->save();
        return redirect('/admin/product/edit/detailAttr')->with('thongbao','Đã sửa thành công thuộc tính');
       
    }
    public function getDelAttr($id){
        $data['attr'] = attribute::destroy($id);
        return redirect()->back()->with('thongbao','Đã xóa thành công');
    }


    public function postAddValue(AddValueRequest $r){
        $value = new values();
        $value->attr_id =$r->attr_id;
        $value->value = $r->value_name;
        $value ->save();
        return redirect('/admin/product/add')->with('thongbao','Đã thêm giá trị của thuộc tính thành công');
    }
    public function getEditValueAttr($id){
        $data['value'] = values::find($id);
        return view('backend.product.editvalue',$data);
    }
    public function postEditValueAttr(EditValueRequest $r ,$id){
        $value = values::find($id);        
        $value->value = $r->edit_value;
        
        $value ->save();
        return redirect('/admin/product/edit/detailAttr')->with('thongbao','Đã sửa giá trị thuộc tính thành công');
    }
    public function getDelValueAttr($id){
        $value = values::destroy($id);          
        return redirect()->back()->with('thongbao','Đã xóa giá trị thuộc tính thành công');
    }

    public function getAddVariant(){
        return view('backend.product.addvariant');
    }
    public function getEditVariant(){
        return view('backend.product.editvariant');
    }
}
