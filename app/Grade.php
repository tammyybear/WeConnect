<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'schedule_id',
        'student_id',
        'g1st',
        'g2nd',
        'g3rd',
        'g4th',
    ];

    public function schedule()
    {
        return $this->hasOne('App\Schedule', 'id', 'schedule_id');
    }
}
