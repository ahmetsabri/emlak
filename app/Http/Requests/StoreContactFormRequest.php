<?php

namespace App\Http\Requests;

use App\FormTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'message' => ['required', 'string'],
            'type' => ['required', 'string'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'type' => FormTypeEnum::CONTACT->value,
        ]);
    }
}
