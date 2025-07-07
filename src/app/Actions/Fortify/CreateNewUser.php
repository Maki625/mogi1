<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Http\Requests\RegisterRequest;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
    {
        // FormRequestをインスタンス化
        $request = new RegisterRequest();

        // inputをマージ
        $request->merge($input);

        // バリデーション実行
        $validated = validator(
        $request->all(),
        $request->rules(),
        $request->messages()
        )->validate();

        return User::create([
            'name' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
