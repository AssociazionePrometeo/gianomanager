<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'name',
    ];

    public function getStatusAttribute()
    {
        return $this->active ? __('models.resource_enabled') : __('models.resource_disabled');
    }
}
