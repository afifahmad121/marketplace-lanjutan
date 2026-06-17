<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{

    use SoftDeletes;

    protected $table = 'orders_detail' ;
    protected $fillable = [

        'order_id',
        'product_id',
        'quantity',
        'price',
        'status'

    ];

    public function orderDetails(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function orderDetail(){
        return $this->belongsTo(Order::class, 'order_id');
    }
}
