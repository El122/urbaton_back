<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Actions\Teacher\AddTeacherSubjectAction;
use App\Actions\Teacher\DeleteTeacherSubjectAction;
use App\Actions\Teacher\UpdateTeacherSubjectAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subject\TeacherSubjectRequest;
use App\Models\TeacherSubject;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TeacherSubjectController extends Controller {
    public function add(User $teacher, TeacherSubjectRequest $request, AddTeacherSubjectAction $action): JsonResponse {
        $data = $action->handle($teacher, $request->getEntity());
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Teacher subject successfully add',
            'data' => $data,
        ]);
    }

    public function delete(TeacherSubject $teacherSubject, DeleteTeacherSubjectAction $action): JsonResponse {
        $action->handle($teacherSubject);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Teacher subject successfully deleted',
        ]);
    }

    public function update(TeacherSubject $teacherSubject, TeacherSubjectRequest $request, UpdateTeacherSubjectAction $action): JsonResponse {
        $action->handle($teacherSubject, $request->getEntity());
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Teacher subject successfully updated',
        ]);
    }
}
