<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'txtNewPass'       => 'required|min:8',
            'txtCnfpass'       => 'required|same:txtNewPass'
        ];
    }

    public function messages(){
        return [
            'txtNewPass.required' => 'New Password is required',
            'txtCnfpass.required' => 'Confirm Password is required',
            'txtNewPass.min' => 'Minimum 8 character is required',
            'txtCnfpass.same' => 'Confirm Password must be same with new password',
        ];
    }
}
