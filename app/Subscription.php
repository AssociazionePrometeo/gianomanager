<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
  protected $fillable = [
      'name',
  ];

public function getStatusAttribute()
  {
      return $this->active ? __('models.subscription_enabled') : __('models.subscription_disabled');
  }
}
