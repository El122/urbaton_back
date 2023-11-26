<?php

namespace App\Http\Requests\Timetable;

use App\Entities\Timetable\TimetableEntity;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\ValidationError;
use Illuminate\Contracts\Validation\Validator;

class TimetableRequest extends FormRequest {
    public function failedValidation(Validator $validator) {
        throw new ValidationError($validator->messages());
    }

    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'date' => ['required', 'date'],
            'timetable' => ['required', 'array'],
            'timetable.*' => ['required', 'array'],
            'timetable.*.group' => ['required', 'integer', 'exists:groups,id'],
            'timetable.*.subjects' => ['required', 'array'],
            'timetable.*.subjects.*' => ['required', 'integer', 'exists:teacher_subjects,id'],
        ];
    }

    public function getEntity(): TimetableEntity {
        return new TimetableEntity(
            $this->date,
            $this->timetable,
        );
    }
}
