<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name'                   =>'required',
            'last_name'                    =>'required',
            'email'                        =>'required',
            'phone_number'                 =>'required',
            'msg'                          =>'required',

        ];
    }

       public function messages()
    {
        return [
            'first_name.required'           =>'هذا الحقل مطلوب',
            'last_name.required'            =>'هذا الحقل مطلوب',
            'email.required'                =>'هذا الحقل مطلوب',
            'phone_number.required'         =>'هذا الحقل مطلوب',
            'msg.required'                  =>'هذا الحقل مطلوب',
        ];
    }
}
