<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;

    protected $table = 'orders_table';
    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'status'

    ];


    public function usersId(){
        return $this->belongsTo(User::class, 'users_id');

    }

    public function orderDetail(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
