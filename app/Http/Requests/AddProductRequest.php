<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'product_code'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'info'=>'required',
            'description'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'product_code.required'=>'Không được để trống mã sản phẩm',
            'product_name.required'=>'Không được để trống tên sản phẩm',
            'product_price.required'=>'Không được để trống giá sản phẩm',
            'info.required'=>'Không được để trống thông tin sản phẩm',
            'description.required'=>'Không được để trống miêu tả sản phẩm',
        ];
    }
}
