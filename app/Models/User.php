<?php

namespace App\Models;

use Lib\Model;

class User extends Model
{
    protected static string $table = 'users';

    public static function findByEmail(string $email): array|null
    {
        return self::findMany("WHERE email = '{$email}'")[0];
    }
}
