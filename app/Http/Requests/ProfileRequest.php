<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|string|min:1|max:255',
            'name_kana' => 'required|string|min:1|max:255',
            'email' => 'required|email|min:1|max:255',
            'profile_image' => 'nullable|mimes:jpg',
        ];

        
    }

    public function attributes()
    {
        return [
            'name' => 'ユーザー名',
            'name_kana' => 'カナ',
            'email' => 'メールアドレス',
            'profile_image' => 'プロフィール画像',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributeは入力必須です',
            'name_kana.required' => ':attributeは入力必須です',
            'email.required' => ':attributeは入力必須です',
            'email.email' => 'メールアドレスの形式が正しくありません',
            'profile_image.mimes' => '指定されたファイル形式ではありません',
        ];
    }
}
