<?php

namespace App\Actions\Group;

use App\Entities\Group\GroupEntity;
use App\Models\Group;

class CreateGroupAction {
    public function handle(GroupEntity $entity): Group {
        return Group::create($entity->getModel());
    }
}
