<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'required' => ':attribute は必須項目です。',
    'string' => ':attribute は文字列で入力してください。',
    'max' => [
        'string' => ':attribute は :max 文字以内で入力してください。',
    ],
    'min' => [
        'string' => ':attribute は :min 文字以上で入力してください。',
    ],
    'email' => ':attribute は有効なメールアドレス形式で入力してください。',
    'confirmed' => ':attribute が確認用と一致しません。',
    'unique' => ':attribute はすでに使用されています。',
    'boolean' => ':attribute は true または false を指定してください。',
    'integer' => ':attribute は整数で入力してください。',
    'exists' => '選択された :attribute は正しくありません。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    | フィールド名を日本語にする
    */

    'attributes' => [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード（確認）',
        'title' => 'タイトル',
    ],
];
