<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'class_id',
        'day',
        'from',
        'to',
        'is_holiday'
    ];
}
