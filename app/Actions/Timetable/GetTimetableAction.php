<?php

namespace App\Actions\Timetable;

use App\Models\Timetable;

class GetTimetableAction {
    public function handle(string $date, ?int $group, ?int $teacher) {
//        if(auth()->user()->isStudent())
//             $this->generateGroupTimetable($date, auth()->user()->student->group_id);
//        if(auth()->user()->isTeacher())
//            $this->generateTeacherTimetable($date, auth()->id());
//        if(auth()->user()->isParent())
//            $this->generateTeacherTimetable($date, auth()->id());
        if($group) {
            return $this->generateGroupTimetable($date, $group);
        }
        if($teacher) {
            return $this->generateTeacherTimetable($date, $teacher);
        }
    }

    private function generateGroupTimetable(string $date, int $group) {
        return Timetable::with('teacherSubject', 'teacherSubject.subject')->where([
            'date' => $date,
            'group_id' => $group
        ])->orderBy('index')->get();
    }

    private function generateTeacherTimetable(string $date, int $teacher) {
        return Timetable::withWhereHas('teacherSubject', function($query) use ($teacher)
            {
                $query->where('user_id', $teacher)->with('subject');
        })->where(['date' => $date])->orderBy('index')->get();
    }
}
