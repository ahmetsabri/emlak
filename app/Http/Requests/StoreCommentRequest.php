<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'name' => ['required'],
            'show_name' => ['sometimes', 'boolean'],
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'comment' => ['required'],
        ];
    }
}
