<?php

namespace App\Http\Requests\Group;

use App\Entities\Group\GroupEntity;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\ValidationError;
use Illuminate\Contracts\Validation\Validator;

class GroupRequest extends FormRequest {
    public function failedValidation(Validator $validator) {
        throw new ValidationError($validator->messages());
    }

    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string'],
            'teacher' => ['required', 'exists:users,id'],
        ];
    }

    public function getEntity(): GroupEntity {
        return new GroupEntity(
            $this->name,
            $this->teacher,
        );
    }
}
