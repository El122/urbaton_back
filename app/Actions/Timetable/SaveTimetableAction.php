<?php

namespace App\Actions\Timetable;

use App\Entities\Timetable\TimetableEntity;
use App\Models\Timetable;

class SaveTimetableAction {
    public function handle(TimetableEntity $entity): void {
        foreach($entity->timetable as $item) {
            foreach($item['subjects'] as $key => $subject) {
                Timetable::create([
                    'date' => $entity->date,
                    'index' => $key,
                    'teacher_subject_id' => $subject,
                    'group_id' => $item['group'],
                ]);
            }
        }
    }
}
