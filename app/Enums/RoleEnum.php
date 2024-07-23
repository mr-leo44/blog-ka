<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case AUTHOR = 'authors';
    case MANAGER = 'manager';
}
