<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', Rule::unique('posts', 'title')->ignore($this->route('post'))],
            'description' => 'required|min:10',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
