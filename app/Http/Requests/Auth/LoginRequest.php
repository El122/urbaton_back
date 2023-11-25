<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\ValidationError;

class LoginRequest extends FormRequest {
    public function failedValidation(Validator $validator) {
        throw new ValidationError($validator->messages());
    }

    public function authorize(): bool {
        return !auth()->check();
    }

    public function rules(): array {
        return [
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'string'],
        ];
    }
}
