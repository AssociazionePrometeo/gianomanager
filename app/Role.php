<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['id', 'name', 'permissions'];

    protected $attributes = ['protected'   => false];

    public $incrementing = false;

    public function isProtected()
    {
        return $this->getAttribute('protected');
    }

    public function setPermissionsAttribute($permissions)
    {
        if (is_null($permissions)) {
            $this->attributes['permissions'] = "{}";

            return;
        }

        // Filter out invalid permissions.
        $permissions = array_only($permissions, Permission::all());

        // Cast permissions to boolean.
        $permissions = array_map(function($value) { return boolval($value); }, $permissions);

        // Eventually JSON encode for persisting in the database.
        $this->attributes['permissions'] = $this->castAttributeAsJson('permissions', $permissions);
    }

    public function getPermissionsAttribute()
    {
        return $this->fromJson($this->attributes['permissions']);
    }
}
