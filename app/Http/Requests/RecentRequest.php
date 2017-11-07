<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecentRequest extends FormRequest
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
           'description'     =>'required|min:4|max:100',
           'project_id'      =>'required',
           'img'             =>'mimes:jpg,jpeg,png',
        ];
    }

     public function  messages()
    {
         return [
           'description.required'            =>'هذا الحقل مطلوب',
           'description.min'                 =>'هذا الحقل  لا يجب ان يكون اقل من 4',
           'description.max'                 =>'هذا الحقل لايجب ان يزيد عن 100 حقل',
           'project_id.required'              =>'هذا الحقل مطلوب',
           'img.mimes'                        =>'الصور يجب ان تكون jpg,jpeg,png',
            ];
    }
}
