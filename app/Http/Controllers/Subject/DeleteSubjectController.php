<?php

namespace App\Http\Controllers\Subject;

use App\Actions\Subject\DeleteSubjectAction;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Symfony\Component\HttpFoundation\Response;

class DeleteSubjectController extends Controller {
    public function delete(Subject $subject, DeleteSubjectAction $action) {
        $action->handle($subject);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Subject successfully delete',
        ]);
    }
}
