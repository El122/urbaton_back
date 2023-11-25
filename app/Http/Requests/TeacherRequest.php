<?php

namespace App\Http\Requests;

use App\Entities\User\TeacherEntity;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Exceptions\ValidationError;

class TeacherRequest extends FormRequest {
    public function failedValidation(Validator $validator) {
        throw new ValidationError($validator->messages());
    }

    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'patronymic' => ['string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => [$this->user ? 'nullable' : 'required', 'string', Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            ],
            'experience' => ['required', 'integer'],
            'role' => ['nullable', 'string'],
        ];
    }

    public function getEntity(): TeacherEntity {
        return new TeacherEntity(
            $this->name,
            $this->surname,
            $this->patronymic,
            $this->email,
            $this->password,
            $this->experience,
            $this->role,
        );
    }
}
