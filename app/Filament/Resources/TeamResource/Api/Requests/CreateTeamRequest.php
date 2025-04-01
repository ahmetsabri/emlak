<?php

namespace App\Filament\Resources\TeamResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeamRequest extends FormRequest
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
            'company_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'email_verified_at' => 'required',
            'password' => 'required|string',
            'remember_token' => 'required|string',
            'team_member' => 'required|integer',
            'ttyb_no' => 'required|string',
        ];
    }
}
