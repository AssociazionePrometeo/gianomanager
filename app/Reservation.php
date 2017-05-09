<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $dates = ['starts_at', 'ends_at', 'created_at', 'updated_at'];

    protected $visible = ['id', 'user_id', 'resource_id', 'starts_at', 'ends_at', 'card_id'];

    protected $appends = ['card_id'];

    protected $fillable = ['starts_at', 'ends_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }
}
