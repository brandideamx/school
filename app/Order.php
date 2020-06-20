<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'student_id',
        'cycle_id',
        'status',
        'cancel_notes',
        'additional_comments',
        'details',
        'partial',
        'paid'
    ];
}
