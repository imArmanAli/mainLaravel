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
            'txtEmail'      => 'required|email:rfc,dns|unique:tbl_register,email',
            'txtUserName'   => 'required|unique:tbl_register,username',
            'txtPass'       => 'required|min:8',
            'txtCpass'      => 'required|same:txtPass'
        ];
    }
}
