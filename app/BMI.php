<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{
    protected $table = 'bmi';

    protected $fillable = [
        'section_id',
        'student_id',
        'birthday',
        'gender',
        'weight',
        'height',
        'bmi',
        'year',
        'result',
    ];

    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }

}
