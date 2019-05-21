<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    protected $table = 'incident_reports';
    protected $fillable = [
        'student_id',
        'report',
        'date_reported',
    ];

    public function student()
    {
        return $this->hasOne('App\Student', 'lrn', 'student_id');
    }
}
