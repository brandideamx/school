<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
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
