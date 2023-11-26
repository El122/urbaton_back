<?php

namespace App\Actions\Timetable;

class GetTimetableAction {
    public function handle(string $date, ?int $group, ?int $teacher) {
//        if(auth()->user()->isStudent())
//             $this->generateGroupTimetable($date, auth()->user()->student->group_id);
//        if(auth()->user()->isTeacher())
//            $this->generateTeacherTimetable($date, auth()->id());
//        if(auth()->user()->isParent())
//            $this->generateTeacherTimetable($date, auth()->id());
        if($group) {
            $this->generateGroupTimetable($date, $group);
        }
        if($teacher) {
            $this->generateTeacherTimetable($date, $teacher);
        }
    }

    private function generateGroupTimetable(string $date, int $group) {

    }

    private function generateTeacherTimetable(string $date, int $teacher) {

    }
}
