<?php

namespace App\Http\Requests\Subject;

use App\Entities\Subject\SubjectEntity;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\ValidationError;
use Illuminate\Contracts\Validation\Validator;

class SubjectRequest extends FormRequest {
    public function failedValidation(Validator $validator) {
        throw new ValidationError($validator->messages());
    }

    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string'],
        ];
    }

    public function getEntity(): SubjectEntity {
        return new SubjectEntity(
            $this->name,
        );
    }
}
