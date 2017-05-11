<?php

namespace App;

class Permission
{
    protected static $models = ['card', 'resource', 'reservation', 'user', 'role'];

    protected static $abilities = ['view', 'create', 'update', 'delete'];

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