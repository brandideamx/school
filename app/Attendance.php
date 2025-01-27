<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'class_id',
        'student_id',
        'status',
        'date'
    ];
}
