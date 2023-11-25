<?php

namespace App\Http\Requests\Subject;

use App\Entities\Subject\TeacherSubjectEntity;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\ValidationError;
use Illuminate\Contracts\Validation\Validator;

class TeacherSubjectRequest extends FormRequest {
    public function failedValidation(Validator $validator) {
        throw new ValidationError($validator->messages());
    }

    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'subject' => [$this->teacherSubject ? 'nullable' : 'required', 'exists:subjects,id'],
            'group' => [$this->teacherSubject ? 'nullable' : 'required', 'exists:groups,id'],
            'plan' => ['required', 'integer'],
        ];
    }

    public function getEntity(): TeacherSubjectEntity {
        return new TeacherSubjectEntity(
            $this->subject,
            $this->group,
            $this->plan,
        );
    }
}

