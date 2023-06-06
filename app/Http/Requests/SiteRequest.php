<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
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
            'txtCategory'       => 'required',
            'txtProtocol'       => 'required',
            'txtName'           => 'required',
            'txtTitle'          => 'required',
            'txtKeywords'       => 'required',
        ];
    }

    public function messages(){
        return [
            'txtCategory.required' => 'Cateogory is required',
            'txtProtocol.required' => 'Protocol is required',
            'txtName.required' => 'Url is required',
            'txtTitle.required' => 'Title is required',
            'txtKeywords.required' => 'keyword is required',
        ];
    }
}
