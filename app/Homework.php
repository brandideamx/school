<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homework extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'class_id',
        'student_id',
        'delivered',
        'result',
        'date'
    ];
}
