<?php

namespace App\Http\Repositories\Subject;

use App\Models\Subject;

class SubjectRepository {
    public function getAll() {
        return Subject::all();
    }
}
