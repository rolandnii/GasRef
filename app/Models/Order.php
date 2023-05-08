<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = "order_no";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'transid',
        'order_no',
        'user_code',
        'cylinder_size',
        'delivery_date',
        'total',
        'subtotal',
        'delivery',
        'discount',
        'order_date',
        'delivered_date',
        'confirm_date',
        'pick_date',
        'user_confirm',
        'status',
        'deleted',
    ];
}
