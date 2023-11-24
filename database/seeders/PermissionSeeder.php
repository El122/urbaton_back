<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Enums\UserRoles;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::findOrCreate(UserRoles::ROLE_ADMIN->value);
        Role::findOrCreate(UserRoles::ROLE_TEACHER->value);
        Role::findOrCreate(UserRoles::ROLE_PARENT->value);
        Role::findOrCreate(UserRoles::ROLE_STUDENT->value);
    }
}
