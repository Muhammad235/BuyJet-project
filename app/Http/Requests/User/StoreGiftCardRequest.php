<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreGiftCardRequest extends FormRequest
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
            'currency_id' => ['required', 'exists:currencies,id'],
            'giftcard_id' => ['required', 'exists:gift_cards,id'],
            // 'amount' => ['required', 'numeric', 'min:2'],
            // 'is_physical' => ['required', 'boolean'],
            // 'payment_proof' => ['required', 'mimes:jpg,jpeg,png,pdf,doc,docx', 'max:4072'],
        ];
    }

    public function messages()
    {
        return [
            'currency_id.required' => 'Select a giftcard.',
            'currency_id.exists' => 'Select a giftcard.',
            // 'agree.required' => 'You must agree to the terms and conditions.'
        ];
    }
}
