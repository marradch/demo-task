<?php

namespace Managers;

use Models\UserModel;

class UserManager extends AbstractManager
{
    public static function getByName($name)
    {
        if ($name == 'admin') {
            $user = new UserModel();
            $user->name = 'admin';
            $user->password = md5('123');
            return $user;
        }

        return false;
    }
}

