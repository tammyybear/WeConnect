<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicGeneral extends Model
{
    protected $fillable = [
        'any',
        'description',
        'type',
    ];
}
