<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'product_name',
        'quantity',
        'price',
        'total_amount',
    ];
}
