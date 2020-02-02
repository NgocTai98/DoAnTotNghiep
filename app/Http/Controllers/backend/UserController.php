<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
     function getListUser(){

        $data['user'] = User::paginate(3);
        return view('backend.user.listuser',$data);
    }
     function getAddUser(){
        return view('backend.user.adduser');
    }
     function postAddUser(AddUserRequest $r){
        
        $user = new User;
        $user->email = $r->email;
        $user->password = $r->password;
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->level = $r->level;
        $user->save();
        return redirect('/admin/user')->with('thongbao','Đã thêm thành công');
    }
     function getEditUser($idUser){
        $data['user'] = User::find($idUser);
        return view('backend.user.edituser',$data);
    }
     function postEditUser(EditUserRequest $r,$idUser){
        $user = User::find($idUser);
        $user->email = $r->email;
        $user->password = $r->password;
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->level = $r->level;
        $user->save();

        return redirect('/admin/user')->with('thongbao','Đã Sửa thành công');
    }
    function delUser($idUser){
        $user = User::find($idUser)->delete();
        return redirect('/admin/user')->with('thongbao','Đã xóa thành công');
    }
}
