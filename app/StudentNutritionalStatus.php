<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentNutritionalStatus extends Model
{
    protected $table = 'student_nutritional_status';
    protected $fillable = [
        'student_id',
        'height',
        'weight',
    ];

}
