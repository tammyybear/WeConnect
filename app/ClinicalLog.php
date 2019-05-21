<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicalLog extends Model
{
    protected $table = 'clinic_logs';
    protected $fillable = [
        'student_id',
        'report',
        'date_reported',
    ];
}
