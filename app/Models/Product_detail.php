<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'product_id',
    ];

    /**
     * Get the post that owns the post_detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
