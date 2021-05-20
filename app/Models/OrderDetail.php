<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;
class OrderDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'order_details';
    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'price',
        'total'
    ];
   
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
