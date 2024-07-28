<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['sometimes', 'required', 'string', 'max:255'],
            'lastname' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes','required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id),],
            'bank_name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'account_number' => ['sometimes', 'nullable', 'string', 'numeric'],
            'account_name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'dob' => ['sometimes', 'nullable', 'date'],
        ];
    }
}
