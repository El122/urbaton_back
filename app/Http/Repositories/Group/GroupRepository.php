<?php

namespace App\Http\Repositories\Group;

use App\Models\Group;

class GroupRepository {
    public function getAll() {
        return Group::all();
    }
}
