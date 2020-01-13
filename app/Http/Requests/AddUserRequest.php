<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email'=>'required|email|unique:user,email',
            'password'=>'required',
            'full'=>'required',
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
            'full.required'=>'Không được để trống full name',
            'address.required'=>'Không được để trống Address',
            'phone.required'=>'Không được để trống Phone',
        ];
    }
}
