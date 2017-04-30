<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['id', 'name'];

    public $incrementing = false;

    protected $casts = [
        'permissions' => 'array',
    ];
}
