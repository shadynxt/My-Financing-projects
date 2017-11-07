<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BriefRequest extends FormRequest
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
            'title' =>'required',
            'body'  =>'required',
        ];
    }

     public function messages()
    {
        return [
            'title.required'            =>'هذا الحقل مطلوب',
            'body.required'            =>'هذا الحقل مطلوب',
        ];
    }
}
