<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'cycle_id',
        'scholarship_id',
        'turn_id',
        'name'
    ];
}
