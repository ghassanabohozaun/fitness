<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CertificationRequest extends FormRequest
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
            'file' => 'required_without:hidden_file|mimes:pdf,png,jpg,jpeg|max:2048',
        ];
    }

    public function messages(){
        return [
            'file.file_required'=>__('courses.file_required'),
            'file.file_mimes'=>__('courses.file_mimes'),
            'file.max'=>__('courses.file_max'),
        ];
    }
}
