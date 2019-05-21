<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'username',
        'picture',
        'status',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function incidentReports()
    {
        return $this->hasMany('App\IncidentReport');
    }

    public function sections()
    {
        return $this->hasMany('App\Section', 'adviser_id');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule', 'user_id');
    }

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

}
