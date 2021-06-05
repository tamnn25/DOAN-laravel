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
        'discount',
        'product_id',
        'promotion_id',
        
    ];
    public function promotion()
    {
        return $this->hasMany(Promotion::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

  
}
