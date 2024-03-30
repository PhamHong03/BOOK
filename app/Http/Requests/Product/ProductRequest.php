<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'thumnb' => 'required'
        ];
    }

    public function message() :array
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'thumnb.required' => 'Ảnh không được trống '
        ];
    }
}
