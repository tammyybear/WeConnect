<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'item',
        'count',
        'date',
        'created_by',
        'updated_by',
        'remarks',
    ];
}
