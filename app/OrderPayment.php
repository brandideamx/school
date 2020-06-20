<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderPayment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'payment_type_id',
        'media_id',
        'amount'
    ];
}
