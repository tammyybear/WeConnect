<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'school_year',
        'name',
        'grade_level',
        'room_id',
        'adviser_id',
    ];

    public function adviser()
    {
        return $this->hasOne('App\User', 'id', 'adviser_id');
    }

    public function room()
    {
        return $this->hasOne('App\Room', 'id', 'room_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student', 'section_student');
    }

    public function schedule()
    {
        return $this->hasOne('App\Schedule', 'section_id', 'id');
    }

    public function bmis()
    {
        return $this->hasMany('App\BMI', 'section_id', 'id');
    }
}
