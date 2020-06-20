<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'inventorial',
        'stock',
        'interest',
        'duedate',
        'apply_grant',
        'currency',
        'recurrence',
        'starts',
        'ends'
    ];
}
