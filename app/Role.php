<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['id', 'name'];

    protected $attributes = ['protected'   => false];

    public $incrementing = false;

    protected $casts = [
        'permissions' => 'array',
    ];

    public function isProtected()
    {
        return $this->getAttribute('protected');
    }
}
