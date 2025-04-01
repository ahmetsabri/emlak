<?php

namespace App\Http\Requests;

use App\FormTypeEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobFormRequest extends FormRequest
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
            'attachment' => ['required', 'file', 'mimes:pdf,docx,doc'],
            'type' => ['required', 'string'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'type' => FormTypeEnum::JOB->value,
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        dd($validator->errors()->all());
    }
}
