<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'product_name'          => 'required|string|max:255',
            'product_description'   => 'required|string|max:255',
            'product_image'         => 'required|file|mimes:jpeg,png',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'product_condition'     => 'required',
            'price'                 => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'product_name.required'         => '商品名を入力してください',
            'product_description.required'  => '商品説明を入力してください',
            'product_description.max'       => '255文字以内で入力してください',
            'product_image.required'        => '商品画像を登録してください',
            'product_image.mimes'           => '「.png」または「.jpeg」形式でアップロードしてください',
            'category.required'             => 'カテゴリーを選択してください',
            'product_condition.required'    => '商品状態を選択してください',
            'price.required'                => '値段を入力してください',
            'price.numeric'                 => '数値で入力してください',
            'price.min'                     => '0円以上で入力してください',
        ];
    }

}
