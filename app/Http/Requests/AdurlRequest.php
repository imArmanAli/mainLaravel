<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdurlRequest extends FormRequest
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
            // 'txtFile'       => 'required_without:window78file',
            // 'window78file'       => 'required_without:txtFile',
            // 'txtPass'       => 'required',
            // 'txtAndroid'    => 'required',
            // 'txtMac'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            // 'txtFile.required'    => 'Window Url is required',
            // 'txtPass.required'    => 'Password is required',
            // 'txtAndroid.required' => 'Android Url is required',
            // 'txtMac.required'     => 'Mac Url is required'
        ];
    }
}
