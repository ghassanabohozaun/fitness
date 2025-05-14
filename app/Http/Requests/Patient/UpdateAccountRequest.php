<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            // 'name_ar' => 'required',
            // 'name_en' => 'required',
            'password' => 'sometimes',
            'confirm_password' => 'sometimes|same:password',
            'mobile' => 'required',
            //'email' => 'sometimes|email|unique:students',
            'whatsapp' => 'required',
            'gender' => 'required|in:male,female',
            'photo' => 'sometimes||image|mimes:png,jpg,jpeg|max:1024',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => __('site.email_required'),
            'email.email' => __('site.email_email'),
            'password.required' => __('site.password_required'),
            '' => __(''),
            'confirm_password.same' => __('site.password_same'),
            'password.min' => __('site.min_length'),
            'gender.in' => __('site.in'),
            'photo.image' => __('site.image'),
            'photo.mimes' => __('site.mimes'),
            'photo.max' => __('site.image_max'),
        ];
    }
}
