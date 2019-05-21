<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicChecking extends Model
{
    protected $fillable = [
        'section_id',
        'user_id',
        'answer',
        'type',
        'date',
    ];
}
