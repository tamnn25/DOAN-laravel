<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'images',
        'price',
        'status',
        'category_id',
    ];

    public const PAGE_LIMIT = 10;

    /**
     * Get the category that owns the post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the post_detail for the post.
     */
    public function product_detail()
    {
        return $this->hasOne(Product_detail::class);
    }
}
