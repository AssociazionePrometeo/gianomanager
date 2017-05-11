<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['id'];

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function disable()
    {
        $this->active = false;

        return $this;
    }

    public function enable()
    {
        $this->active = true;

        return $this;
    }

    public function getStatusAttribute()
    {
        return $this->active ? __('models.card_enabled') : __('models.card_disabled');
    }
}
