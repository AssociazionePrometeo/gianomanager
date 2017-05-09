<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    const STATUS_ENABLED = 'enabled';
    const STATUS_DISABLED = 'disabled';

    protected $fillable = ['id'];

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function isEnabled()
    {
        return $this->status == self::STATUS_ENABLED;
    }

    public function disable()
    {
        $this->status = self::STATUS_DISABLED;

        return $this;
    }

    public function enable()
    {
        $this->status = self::STATUS_ENABLED;

        return $this;
    }
}
