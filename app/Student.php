<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'lrn',
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'nickname',
        'address',
        'contact_number',
        'email',
        'picture',
        'birthdate',
        'nationality',
        'religion',
        'gender',
        'civil_status',
        'verification_code',
        'is_verified',
        'guardian_name',
        'guardian_relation',
        'guardian_contact',
        'has_birthcert',
        'has_form137',
    ];

    public function sections()
    {
        return $this->belongsToMany('App\Section', 'section_student');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function bmis()
    {
        return $this->hasMany('App\BMI', 'student_id', 'id');
    }
}
