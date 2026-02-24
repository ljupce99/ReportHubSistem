<?php

namespace App\Enums;

enum UserRolesEnum: string
{
    case ADMIN = 'admin';
    case HR = 'hr';
    case MANAGER = 'manager';
    case EMPLOYEE = 'employee';
}
