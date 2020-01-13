<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getListUser(){
        return view('backend.user.listuser');
    }
    public function getAddUser(){
        return view('backend.user.adduser');
    }
    public function postAddUser(AddUserRequest $r){
        return redirect('/admin/user')->with('thongbao','Đã thêm thành công');
    }
    public function getEditUser(){
        return view('backend.user.edituser');
    }
    public function postEditUser(EditUserRequest $r){
        return redirect('/admin/user')->with('thongbao','Đã Sửa thành công');
    }
}
