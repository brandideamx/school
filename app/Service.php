<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
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
