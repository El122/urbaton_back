<?php

namespace App\Http\Requests\News;

use App\Entities\News\NewsEntity;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\ValidationError;
use Illuminate\Contracts\Validation\Validator;

class NewsRequest extends FormRequest {
    public function failedValidation(Validator $validator) {
        throw new ValidationError($validator->messages());
    }

    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'title' => ['required', 'string'],
            'text' => ['required', 'string'],
            'type' => ['required', 'string'],
        ];
    }

    public function getEntity(): NewsEntity {
        return new NewsEntity(
            $this->title,
            $this->text,
            $this->type,
        );
    }
}
