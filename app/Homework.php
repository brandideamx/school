<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = [
        'class_id',
        'student_id',
        'delivered',
        'result',
        'date'
    ];
}
