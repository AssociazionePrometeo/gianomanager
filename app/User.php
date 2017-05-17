<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone_number', 'expires_at', 'info',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_token',
    ];

    protected $dates = ['expires_at'];

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function cards()
    {
        return $this->hasMany('App\Card');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function isAdmin()
    {
        return $this->roles()->where('id', '=', 'admin')->exists();
    }

    public function getPermissionsAttribute()
    {
        return $this->roles()->pluck('permissions')->collapse();
    }

    public function getActiveAttribute()
    {
        return $this->validated && !$this->isExpired();
    }

    public function isExpired()
    {
        return $this->expires_at !== null && $this->expires_at < Carbon::now();
    }

    public function verify()
    {
        $this->email_verified = 1;
        $this->email_token = null;
        if ($this->new_email !== null){
        $this->email = $this->new_email;
        $this->new_email = null;
        }
        $this->save();
    }

    public function getStatusLabel()
    {
        if ($this->active) {
            return __('models.user_status_active');
        }

        if ($this->isExpired()) {
            return __('models.user_status_expired');
        }

        if (!$this->validated) {
            return __('models.user_status_not_validated');
        }
    }
}
