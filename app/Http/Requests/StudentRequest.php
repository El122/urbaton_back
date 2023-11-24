<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Exceptions\ValidationError;
use App\Entities\User\StudentEntity;

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
            'email' => ['required', 'email'],
            'password' => [$this->user ? 'nullable' : 'required', 'string', Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            ],
            'group' => ['group', 'integer', 'exists:groups, id'],
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
