<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $fillable = ['cycle_id', 'student_id', 'percentage'];
}
