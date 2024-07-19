<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'username',
        'email',
        'phone',
        'address',
        'country',
        'transaction_type',
        'total',
    ];
}
