<?php

namespace App\Actions\Timetable;

class GenerateTimetableAction {
    public function handle(): array {
        $groups = \App\Models\Group::all();
        $timetable = [];

        foreach($groups as $key => $group) {
            $timetable[$key] = [];
            $subjects = $group->subjects->filter(fn($item) => $item->current != $item->total);

            $counter = $subjects->count() * 12;
            for($i = 0; $i < 5 && $counter; ++$i) {
                $index = $subjects->random();

                if(in_array($index, $timetable[$key])) {
                    --$i;
                    --$counter;
                    continue 2;
                }

                foreach($timetable as $timetableItem) {
                    if(count($timetableItem) && isset($timetableItem[$i]) && ($timetableItem[$i] == $index || $timetableItem[$i]->user_id == $index->user_id)) {
                        --$i;
                        --$counter;
                        continue 2;
                    }
                }

                $timetable[$key][] = $index->withData();
            }
        }

        return $timetable;
    }
}
