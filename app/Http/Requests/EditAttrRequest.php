<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAttrRequest extends FormRequest
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
            'edit_attr' => 'required|unique:attribute,name'
        ];
    }
    public function messages()
    {
        return [
            'edit_attr.required' => 'Tên thuộc tính không được để trống',
            'edit_attr.unique' => 'Tên thuộc tính đã tồn tại' 
        ];
    }
}
