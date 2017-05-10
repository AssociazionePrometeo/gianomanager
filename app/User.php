<?php

namespace App;

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
        'name', 'email', 'password', 'phone_number', 'user_level', 'signup_date', 'expires_at', 'last_login',
        'active', 'info',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
}
