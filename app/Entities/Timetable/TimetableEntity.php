<?php

namespace App\Entities\Timetable;

class TimetableEntity {
    public function __construct(
        public string $date,
        public array  $timetable,
    ) {}
}
