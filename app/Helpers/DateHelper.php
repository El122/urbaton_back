<?php

namespace App\Helpers;

class DateHelper {
    public static function currentStudyYear(): string {
        $month = now()->month;
        $year = now()->year;

        if($month < 9)
            return $year - 1 . '/' . $year;
        return $year . '/' . $year + 1;
    }
}
