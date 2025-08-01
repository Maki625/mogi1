<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        'name'  => 'required|string|max:20',
        'email'     => 'required|string|email|max:255|unique:users', // uniqueで重複禁止
        'password'  => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'お名前を入力してください',
            'email.required'     => 'メールアドレスを入力してください',
            'email.email'        => 'メールアドレスはメール形式で入力してください',
            'password.required'  => 'パスワードを入力してください',
            'password.min'       => 'パスワードは8文字以上で入力してください',
            'password.confirmed' => 'パスワードと一致しません'
        ];
    }

}
