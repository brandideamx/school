<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    protected $fillable = [
        'class_id',
        'teacher_id',
        'status',
        'date'
    ];
}
