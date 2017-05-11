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

        return $permissions;
    }

    public static function model($model)
    {
        $permissions = [];
        foreach (self::$abilities as $ability) {
            $permissions[] = $model . '-' . $ability;
        }

        return $permissions;
    }
}