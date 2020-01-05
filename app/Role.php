<?php

namespace App;

class Role extends \Spatie\Permission\Models\Role 
{
    public static function getdefaultRoles() {
        return [
            'SuperAdmin',
            'Admin',
            'Manager',
            'User'
        ];
    }
}
