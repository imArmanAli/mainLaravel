<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandingRequest extends FormRequest
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
            'txtAdname'       => 'required',
            'txtUrl'          => 'required',
            'txtKeyword'      => 'required',
            'radStatus'       => 'required'
        ];
    }

    public function messages(){
        return [
            'txtAdname.required'    => 'Ad name is required',
            'txtUrl.required'       => 'Ad Url is required',
            'txtKeyword.required'   => 'Ad Keyword Url is required',
            'radStatus.required'    => 'Status is required'
        ];
    }
}
