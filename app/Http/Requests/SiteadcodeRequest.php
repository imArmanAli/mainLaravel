<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteadcodeRequest extends FormRequest
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
            'txtAdCode'       => 'required',
            'txtAdblock'      => 'required',
            'txtbtnlable'     => 'required',
            'txtBtnPrice'     => 'required',
            'txtSite'         => 'required',
            'platform'        => 'required',
        ];
    }

}
