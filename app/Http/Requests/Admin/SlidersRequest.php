<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SlidersRequest extends FormRequest
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
            'title_ar' => 'required',
            'title_en' => 'required_if:site_lang_en,on',
            'details_ar' => 'required',
            'details_en' => 'required_if:site_lang_en,on',
            'order' => 'required|numeric',
            'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('sliders.required'),
            'required_if' => __('sliders.required'),
            'in' => __('sliders.in'),
            'numeric' => __('sliders.numeric'),
            'image' => __('sliders.image'),
            'unique' => __('sliders.unique'),
            'mimes' => __('sliders.mimes'),
            'max' => __('sliders.image_max'),
            'photo.required_without' => __('sliders.photo_required'),
        ];
    }
}
