<?php

namespace Repositories;

use Models\UserModel;

class UserRepository extends AbstractRepository
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
