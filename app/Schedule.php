<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'section_id',
        'subject_id',
        'user_id',
        'start_time',
        'end_time',
        'days',
    ];

    public function subject()
    {
        return $this->hasOne('App\Subject', 'id', 'subject_id');
    }

    public function section()
    {
        return $this->hasOne('App\Section', 'id', 'section_id');
    }

    public function teacher()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function grades()
    {
        return $this->hasMany('App\Grade', 'schedule_id', 'id');
    }

    public function perDays()
    {
        $day = $this->days;
        $perDays = explode(', ', $day);
        return $perDays;
    }
}
