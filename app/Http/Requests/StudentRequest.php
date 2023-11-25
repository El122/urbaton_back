<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Exceptions\ValidationError;
use App\Entities\User\StudentEntity;
use Illuminate\Contracts\Validation\Validator;

class StudentRequest extends FormRequest
{
    public function failedValidation(Validator $validator) {
        throw new ValidationError($validator->messages());
    }

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
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
            'group' => ['required', 'integer', 'exists:groups,id'],
        ];
    }

    public function getEntity(): StudentEntity
    {
        return new StudentEntity(
            $this->name,
            $this->surname,
            $this->patronymic,
            $this->email,
            $this->password,
            $this->group,
        );
    }
}
