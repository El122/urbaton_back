<?php

namespace App\Actions\Parent;

use App\Models\ParentStudent;

class DetachParentUserAction {
    public function handle(ParentStudent $parentStudent): void {
        $parentStudent->delete();
    }
}
