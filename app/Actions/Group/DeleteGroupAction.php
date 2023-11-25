<?php

namespace App\Actions\Group;

use App\Models\Group;

class DeleteGroupAction {
    public function handle(Group $group): void {
        $group->delete();
    }
}
