<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class BuyCryptoRequest extends FormRequest
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
            'cryptocurrency_id' => ['required'],
            'amount' => ['required'],
            'wallet_address' => ['required'],
            // 'agree' => ['required'],
        ];
    }
}
