<?php

namespace App\Filament\Resources\FormResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'name' => 'required|string',
			'phone' => 'required|string',
			'note' => 'required|string',
			'province_id' => 'required|integer',
			'county_id' => 'required|integer',
			'email' => 'required|string'
		];
    }
}
