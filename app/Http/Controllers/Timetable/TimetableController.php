<?php

namespace App\Http\Controllers\Timetable;

use App\Actions\Timetable\GenerateTimetableAction;
use App\Actions\Timetable\GetTimetableAction;
use App\Actions\Timetable\SaveTimetableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Timetable\TimetableRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimetableController extends Controller {
    public function generate(GenerateTimetableAction $action): JsonResponse {
        $timetable = $action->handle();
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Timetable successfully generated',
            'data' => $timetable,
        ]);
    }

    public function save(TimetableRequest $request, SaveTimetableAction $action): JsonResponse {
        $action->handle($request->getEntity());
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Timetable successfully generated',
        ]);
    }

    public function get(Request $request, GetTimetableAction $action): JsonResponse {
        $timetable = $action->handle($request->date, $request->group, $request->teacher);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Timetable successfully get',
            'data' => $timetable,
        ]);
    }
}
