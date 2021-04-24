<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'images',
        'price',
        'status',
        'hot',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the post_detail for the post.
     */
    public function product_detail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function order_detail()
    {
        return $this->hasOne(ProductDetail::class);
    }


}
