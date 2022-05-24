<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'price'       => ['required', 'numeric', 'min:0'],
            'category_id' => ['required'],
        ];
    }
}
