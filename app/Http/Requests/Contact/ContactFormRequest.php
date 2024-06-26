<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' =>'required',
            'email' => 'required|email',
            'problem' => 'required|min:5',
            'description' => 'required|min:10'
        ];
    }

    public function  messages()  {
        return [
            'name.required' => 'Hãy nhập tên của bạn!',
            'email.required' => 'Vui lòng nhập email của bạn!',
            'problem.required' => 'Vui lòng nêu vấn đề bạn cần giải đáp! VD( Giỏ hàng, đăng ký ...)',
            'description.required' => 'Hãy mô tả sơ lược về vấn đề bạn gặp!'
        ];
    }
}
