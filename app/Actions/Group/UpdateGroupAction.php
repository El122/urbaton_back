<?php

namespace App\Actions\Group;

use App\Entities\Group\GroupEntity;
use App\Models\Group;

class UpdateGroupAction {
    public function handle(Group $group, GroupEntity $entity): void {
        $group->update($entity->getModel());
    }
}
