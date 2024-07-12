<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SellCryptoRequest extends FormRequest
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
            'cryptocurrency_id' => ['required', 'exists:cryptocurrencies,id'],
            'amount' => ['required', 'numeric', 'min:2'],
            'bank_name' => ['required', 'string'],
            'account_number' => ['required', 'numeric'],
            'account_name' => ['required'],
            'asset_network' => ['required'],
            // 'agree' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'cryptocurrency_id.required' => 'Select a cryptocurrency.',
            'cryptocurrency_id.exists' => 'Select a cryptocurrency.',
            // 'agree.required' => 'You must agree to the terms and conditions.'
        ];
    }
}
