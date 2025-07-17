<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'posted_date' => 'required|date',
            'article_contents' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'posted_date' => '投稿日時',
            'article_contents' => '本文',
         ];
    }

    public function messages()
    {
         return [
            'title.required' => ':attributeは入力必須です。',
            'posted_date.required' => ':attributeは入力必須です。',
            'posted_date.date' => '半角英数字で入力してください。',
            'article_contents.required' => ':attributeは入力必須です。',
    ];
}
}
