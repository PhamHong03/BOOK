<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterForm extends FormRequest
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
            'phone' => 'required|min:5',
            'password' => 'required|min:10',
            'confirmPassword' => 'required|min:10|same:password'
        ];
    }

    public function  messages()  {
        return [
            'name.required' => 'Hãy nhập tên của bạn!',
            'email.required' => 'Vui lòng nhập email của bạn!',
            'phone.required' => 'Vui lòng nhập số điện thoại của bạn!',
            'password.required' => 'Hãy nhập mật khẩu.',
            'confirmPassword.required' => 'Chưa chính xác'
        ];
    }
}
