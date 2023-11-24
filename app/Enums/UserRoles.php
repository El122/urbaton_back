<?php

namespace App\Enums;

enum UserRoles:string {
    case ROLE_ADMIN = 'Admin';
    case ROLE_TEACHER = 'Teacher';
    case ROLE_PARENT = 'Parent';
    case ROLE_STUDENT = 'Student';
}