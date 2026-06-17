<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
// use PHPUnit\Framework\MockObject\Stub\ReturnSelf;

class Product extends Model
{
// Relasi: belongsTo ProductCategory, belongsTo User (Seller)

    use HasFactory, SoftDeletes;

    protected $fillable = [

        'title',
        'description',
        'price',
        'rating',
        'thumbnail',
        'file_path',
        'download_count',
        'status',
        'seller_id',
        'category_id',


    ];

    public function category(){
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    protected $casts = ['deleted_at' => 'datetime'];

}
