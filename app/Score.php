<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'class_id',
        'student_id',
        'partial',
        'result',
        'date'
    ];
}
