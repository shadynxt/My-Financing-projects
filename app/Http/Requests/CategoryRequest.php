<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
         // for add Category
        case 'POST':
        {
          
        return [
           'name'          =>'required|unique:categories|min:4|max:28',
           'category_pic'  =>'required'

        ];

        }
        // for edit Category
        case 'PUT':
        case 'PATCH':
        {
            return [
           'name'          =>'required|min:4|max:28',
        
                 ];

        }
        default:break;
    }
    }

       public function messages()
    {
         switch($this->method())
    {
         // for add Category
        case 'POST':
        {
          
        return [
           'name.required'                   =>'هذا الحقل مطلوب',
           'name.unique'                     =>'هذا الحقل يجب ان يكون منفرد',
           'name.min'                        =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
           'name.max'                        =>'هذا الحقل يجب ان لا يقل عن 19 حروف',
           'category_pic.required'           =>'هذا الحقل مطلوب',

        ];

        }
        // for edit Category
        case 'PUT':
        case 'PATCH':
        {
            return [
           'name.required'                   =>'هذا الحقل مطلوب',
           'name.min'                        =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
           'name.max'                        =>'هذا الحقل يجب ان لا يقل عن 19 حروف',
                 ];

        }
        default:break;
    }
    }
}
