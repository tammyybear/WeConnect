<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    protected $table = 'request_forms';
    protected $fillable = [
        'code',
        'name',
        'request',
        'is_checked',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
