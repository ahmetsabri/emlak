<?php

namespace App\Filament\Resources\RealEstateResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRealEstateRequest extends FormRequest
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
			'title' => 'required',
			'description' => 'required',
			'sort' => 'required|integer',
			'category_id' => 'required|integer',
			'user_id' => 'required|integer',
			'province_id' => 'required|integer',
			'county_id' => 'required|integer',
			'district_id' => 'required|integer',
			'price' => 'required|integer',
			'net_area' => 'required|integer',
			'gross_area' => 'required|integer',
			'location' => 'required|string',
			'status' => 'required|string',
			'3d_link' => 'required|string'
		];
    }
}
