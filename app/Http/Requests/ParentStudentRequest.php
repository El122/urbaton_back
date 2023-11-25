<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Exceptions\ValidationError;
use App\Entities\User\ParentStudentEntity;
use Illuminate\Contracts\Validation\Validator;

class ParentStudentRequest extends FormRequest
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
            'parent_id' => ['required', 'integer'],
            'student_id' => ['required', 'integer'],
        ];
    }

    public function getEntity(): ParentStudentEntity
    {
        return new ParentStudentEntity(
            $this->parent_id,
            $this->student_id,
        );
    }
}
