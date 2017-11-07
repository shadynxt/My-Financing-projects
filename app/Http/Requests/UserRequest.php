<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

          switch($this->method())
    {
      // for add idea
        case 'POST':
        {

        return [
            'first_name'      =>'required|min:4|max:19',
            'last_name'       =>'required|min:4|max:19',
            'email'           =>'required|email',
            'phone_number'    =>'min:4|max:19',
            'password'        =>'required|min:8|max:16|confirmed',
            'about_you'       =>'',
            'link'            =>'',
            'link_facebook'   =>'',
            'profile_pic'     =>'',
            'city_id'         =>'required',
            'IBAN'            =>''

        ];

        }
        // for edit idea
        case 'PUT':
        case 'PATCH':
        {
            return [
            'first_name'      =>'required|min:4|max:19',
            'last_name'       =>'required|min:4|max:19',
            'email'           =>'required|email',
            'phone_number'    =>'min:4|max:19',
            'password'        =>'min:8|max:16',
            'about_you'       =>'',
            'link'            =>'',
            'link_facebook'   =>'',
            'profile_pic'     =>'',
            'city_id'         =>'required',
            'IBAN'            =>''

                    ];

        }
        default:break;
    }
    }

       public function messages()
    {


           switch($this->method())
    {
      // for add idea
        case 'POST':
        {

        return [
            'first_name.required'      =>'هذا الحقل مطلوب',
            'first_name.min'           =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'first_name.max'           =>'هذا الحقل يجب ان لا يزيد عن 19 حروف',
            'last_name.required'       =>'هذا الحقل مطلوب',
            'last_name.min'            =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'last_name.max'            =>'هذا الحقل يجب ان لا يزيد عن 19 حروف',
            'email.required'           =>'هذا الحقل مطلوب',
            'email.email'              =>'هذا الحقل يجب ان يكون بريد الكترونى',
            'phone_number.min'         =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'phone_number.max'         =>'هذا الحقل يجب ان لا يزيد عن 19 حروف',
            'password.required'        =>'هذا الحقل مطلوب',
            'password.min'             =>'هذا الحقل يجب ان لا يقل عن 8 حروف',
            'password.max'             =>'هذا الحقل يجب ان لا يزيد عن 19 حروف',
            'password.confirmed'       =>'هذا الحقل غير مؤكد',
            'about_you'                =>'',
            'link'                     =>'',
            'link_facebook'            =>'',
            'profile_pic'              =>'',
            'city_id.required'         =>'هذا الحقل مطلوب',
            'bank_name'                =>'',

        ];

        }
        // for edit idea
        case 'PUT':
        case 'PATCH':
        {
            return [
            'first_name.required'      =>'هذا الحقل مطلوب',
            'first_name.min'           =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'first_name.max'           =>'هذا الحقل يجب ان لا يزيد عن 19 حروف',
            'last_name.required'       =>'هذا الحقل مطلوب',
            'last_name.min'            =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'last_name.max'            =>'هذا الحقل يجب ان لا يزيد عن 19 حروف',
            'email.required'           =>'هذا الحقل مطلوب',
            'email.email'              =>'هذا الحقل يجب ان يكون بريد الكترونى',
            'phone_number.min'         =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'phone_number.max'         =>'هذا الحقل يجب ان لا يزيد عن 19 حروف',
            'password.min'             =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'password.max'             =>'هذا الحقل يجب ان لا يزيد عن 19 حروف',
            'password.confirmed'       =>'هذا الحقل غير مؤكد',
            'about_you'                =>'',
            'link'                     =>'',
            'link_facebook'            =>'',
            'profile_pic'              =>'',
            'city_id.required'         =>'هذا الحقل مطلوب',


                    ];

        }
        default:break;
    }
    }

}
