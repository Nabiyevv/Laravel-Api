<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','min:3','unique:products'],
            'detail' => ['required','min:10'],
            'price' => ['required','numeric'],
            'stock' => ['required','numeric'],
            'discount' => ['required','numeric'],
        ];
    }
}
