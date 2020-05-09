<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'username'=>'required',
            'address'=>'required',
            'phone'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Không được để trống email',
            'email.email'=>'Email phải ở dạng A@gmail.com',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Không được để trống password',
            'username.required'=>'Không được để trống username',
            'address.required'=>'Không được để trống Address',
            'phone.required'=>'Không được để trống Phone',
        ];
    }
}
