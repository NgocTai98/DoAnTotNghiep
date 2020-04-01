<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' =>'required|email'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống tên',
            'address.required' => 'Không được để trống địa chỉ',
            'phone.required' => 'Không được để trống số điện thoại',
            'email.required' => 'Không được để trống email',
            'email.email' => 'Sai định dạng email'
        ];
    }
}
