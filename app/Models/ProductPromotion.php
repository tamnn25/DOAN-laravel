<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ProductPromotion extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'product_promotion';

    protected $fillable = [
        'product_id',
        'promotion_id',
        'discount',
    ];

  
}
