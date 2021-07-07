<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' =>   'required|min:5|max:255',
            'logo' =>   [
                'sometimes',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'dimensions:min_width=100,min_height=100',
                'max:2048'
            ]
        ];
    }
}
