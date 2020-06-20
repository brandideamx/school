<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grant extends Model
{
    use SoftDeletes;

    protected $fillable = ['cycle_id', 'student_id', 'percentage'];
}
