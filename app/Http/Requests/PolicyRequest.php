<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicyRequest extends FormRequest
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
             'body'                               =>'required',
             'site_policy'                        =>'required',
         ];
     }

        public function messages()
     {
         return [
             'body.required'                     =>'هذا الحقل مطلوب',
             'site_policy.required'              =>'هذا الحقل مطلوب',
         ];
     }
}
