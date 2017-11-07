<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        // validation for Add Or Edit User
         return [
            'username'    =>'required|min:4|max:19',
            'email'       =>'required|unique:admins|email',
            'password'    =>'min:8|max:16|confirmed',
              ];
    }


    public function messages()
    {
        return [
            'username.required'         =>'هذا الحقل مطلوب',
            'username.min'              =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'username.max'              =>'هذا الحقل يجب ان لا يقل عن 19 حروف',
            'email.required'            =>'هذا الحقل مطلوب',
            'email.unique'              =>'يجب ان يكون  البريد الالكترونى منفرد',
            'email.email'               =>'يجب ان يكون هذا الحقل بريد الكترونى',
            'password.min'              =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'password.max'              =>'هذا الحقل يجب ان لا يقل عن 19 حروف',
            'password.confirmed'        =>'يجب ان يكون البريد الالكترونى مؤكد'
        ];
    }
}
