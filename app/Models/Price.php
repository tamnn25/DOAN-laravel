<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Price extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'prices';

    protected $fillable = [
        'price_discount',
        'product_id',
        'begin_date',
        'end_date',
        'status',
    ];

    public const STATUS = [
        0, // Private
        1, // Public 
    ];

    public function latestPrice()
    {
        $currentdate = date('Y-m-01 H:i:s');

        return $this->where('end_date', '>=', $currentdate)
            ->where('status', Price::STATUS[1])
            ->first();
    }
    public function order_detail()
    {
        return $this->hasOne(OrderDetail::class, 'price_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
