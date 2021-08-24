<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'created_date' =>       'required|date|date_format:Y-m-d H:i',
            'item_id' =>            'required',
            'price' =>              'required|regex:/^\d+(\.\d{1,2})?$/',
            'discount' =>           'required|max:100',
            'employee_id' =>        'required',
        ];
    }
}
