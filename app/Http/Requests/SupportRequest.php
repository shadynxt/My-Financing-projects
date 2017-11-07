<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportRequest extends FormRequest
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
            'amount_of_contribution'                   =>'required',
            'full_name'                                =>'required',
            'email'                                    =>'required',
            'idea_project_id'                          =>'required'
        ];
    }
        public function  messages()
    {
         return [
           'amount_of_contribution.required'            =>'هذا الحقل مطلوب',
           'full_name.required'                         =>'هذا الحقل مطلوب',
           'email.required'                             =>'هذا الحقل مطلوب',
           'idea_project_id.required'                   =>'هذا الحقل مطلوب',

        ];
    }
}
