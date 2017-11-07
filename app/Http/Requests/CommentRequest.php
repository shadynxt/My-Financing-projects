<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
           'body'                            =>'required|min:4|max:100',
           'idea_project_id'                 =>'required',
           'user_id'                         =>'required',
        ];
    }

    public function messages()
    {
        return [
            'body.required'                   =>'هذا الحقل مطلوب',
            'body.min'                        =>'هذا الحقل يجب ان لا يقل عن 4 حروف',
            'body.max'                        =>'هذا الحقل يجب ان لا يقل عن 100 حروف',
            'idea_project_id.required'        =>'هذا الحقل مطلوب',
            'user_id.required'                =>'هذا الحقل مطلوب',
        ];
    }
}
