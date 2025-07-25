<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'postal_code' => 'required|regex:/^\d{3}-\d{4}$/',
            'address'     => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'postal_code.required'  =>'郵便番号を入力してください',
            'postal_code.regex'     => '8文字で入力してください',
            'address.required'      => '住所を入力してください',
        ];
    }
}
