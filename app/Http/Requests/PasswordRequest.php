<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'current_password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'regex:/^[a-zA-Z0-9]+$/',
            ],
            'new_password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'regex:/^[a-zA-Z0-9]+$/',
            ],
            'password_confirmation' => [
                'required',
                'same:new_password',
                'min:8',
                'max:255',
            ],
          ];
    }

    public function attributes()
    {
        return [
            'current_password' => '旧パスワード',
            'new_password' => '新パスワード',
            'password_confirmation' => '確認用パスワード',
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => ':attributeは必須です。',
            'current_password.min' => ':attributeは8文字以上で入力してください。',
            'current_password.regex' => ':attributeは半角英数字で入力してください。',

            'new_password.required' => ':attributeは必須です。',
            'new_password.min' => ':attributeは8文字以上で入力してください。',
            'new_password.regex' => ':attributeは半角英数字で入力してください。',

            'password_confirmation.required' => ':attributeは必須です。',
            'password_confirmation.same' => '新パスワードと確認用パスワードが一致しません。',
            'password_confirmation.min' => ':attributeは8文字以上で入力してください。',
        ];
    }


}
