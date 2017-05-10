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
}
