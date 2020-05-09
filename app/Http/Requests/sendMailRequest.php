<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sendMailRequest extends FormRequest
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
            "email" => "required|unique:members,email"
        ];
    }
    public function messages()
    {
        return [
            "email.required" => "Email không được để trống",
            "email.unique" => "Email này đã tồn tại"
        ];
    }
}
