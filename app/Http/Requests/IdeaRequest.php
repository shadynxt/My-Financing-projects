<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaRequest extends FormRequest
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
           'address'                =>'required|min:4|max:28',
           'link'                   =>'min:3|max:100',
           'idea'                   =>'required',
           'budget'                 =>'required|min:2|max:28',
           'expected_date'          =>'required',
           'city_id'                =>'required',
           'basic_image'            =>'max:20000|required|mimes:jpg,jpeg,png',
           'video'                  =>'max:20800|max:20|mimes:mp4,webm,mov',
           'category_id'            =>'required',

        ];

        }
        // for edit idea
        case 'PUT':
        case 'PATCH':
        {
            return [
           'address'                 =>'required|min:4|max:28',
           'link'                    =>'min:3|max:100',
           'idea'                    =>'required',
           'budget'                  =>'required|min:2|max:28',
           'expected_date'           =>'required',
           'city_id'                 =>'required',
           'basic_image'             =>'max:20000|mimes:jpg,jpeg,png',
           'video'                   =>'max:20800|mimes:mp4,webm,mov|min:6',
           'category_id'             =>'required',
           'user_id'                 =>'required',

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
            'address.required'         =>'هذا الحقل مطلوب',
            'address.min'              =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'address.max'              =>'هذا الحقل يجب ان لا يقل عن 28 حروف',
            'link.min'                 =>'هذا الحقل يجب ان لا يقل عن 3 حروف',
            'link.max'                 =>'هذا الحقل يجب ان لا يقل عن 100 حروف',
            'idea.required'            =>'هذا الحقل مطلوب',
            'budget.required'          =>'هذا الحقل مطلوب',
            'budget.min'               =>'هذا الحقل يجب ان لا يقل عن 2 حروف',
            'budget.max'               =>'هذا الحقل يجب ان لا يقل عن 28 حروف',
            'expected_date.required'   =>'هذا الحقل مطلوب',
            'city_id.required'         =>'هذا الحقل مطلوب',
            'basic_image.max'          =>'الصوره لا تزيد عن 2 ميجا',
            'basic_image.required'     =>'هذا الحقل مطلوب',
            'basic_image.mimes'        =>'يجب ان يكون jpg او jpeg او png',
            'video.mimes'              =>'يجب ان يكون mp4 او webm او mov',
            'video.max'                =>'الفديو لا يزيد عن 20 ميجا',
            'category_id.required'     =>'هذا الحقل مطلوب'

        ];

        }
        // for edit idea
        case 'PUT':
        case 'PATCH':
        {
            return [
            'first_name.required'      =>'هذا الحقل مطلوب',
            'first_name.min'           =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'first_name.max'           =>'هذا الحقل يجب ان لا يقل عن 19 حروف',
            'last_name.required'       =>'هذا الحقل مطلوب',
            'last_name.min'            =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'last_name.max'            =>'هذا الحقل يجب ان لا يقل عن 19 حروف',
            'email.required'           =>'هذا الحقل مطلوب',
            'email.email'              =>'هذا الحقل يجب ان يكون بريد الكترونى',
            'phone_number.min'         =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'phone_number.max'         =>'هذا الحقل يجب ان لا يقل عن 19 حروف',
            'password.min'             =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'password.max'             =>'هذا الحقل يجب ان لا يقل عن 19 حروف',
            'password.confirmed'       =>'هذا الحقل غير مؤكد',
            'city_id.required'         =>'هذا الحقل مطلوب',
            'about_you'                =>'',
            'basic_image.max'          =>'الصوره لا تزيد عن 2 ميجا',
            'video.max'                =>'الفديو لا يزيد عن 20 ميجا',
            'link'                     =>'',
            'link_facebook'            =>'',
            'profile_pic'              =>'',

                    ];

        }
        default:break;
    }


    }
}
