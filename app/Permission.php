<?php

namespace App;

class Permission
{
    public static $models = ['card', 'resource', 'reservation', 'user', 'role'];

    public static $abilities = ['view', 'create', 'update', 'delete'];

    public static function all()
    {
        $permissions = [];

        foreach (self::$models as $model) {
            $permissions = array_merge($permissions, self::model($model));
        }

        // Special permission for user
        $permissions[] = 'user-validate';

        return $permissions;
    }

    public static function model($model)
    {
        $permissions = [];
        foreach (self::$abilities as $ability) {
            $permissions[] = $model . '-' . $ability;
        }

        // Special permission for user
        if ($model == 'user') {
            $permissions[] = 'user-validate';
        }

        return $permissions;
    }

    public static function getAdminValues()
    {
        return array_reduce(self::all(), function ($carry, $permission) {
            $carry[$permission] = true;
            return $carry;
        }, []);
    }
}
