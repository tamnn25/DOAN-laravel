<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;
use Carbon\Carbon;

class Promotion extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'promotions';

    protected $casts = [
        'begin_date'  => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
    ];
    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];

    protected $fillable = [
        'discount',
        'begin_date',
        'end_date',
        'status',
    ];

   
    public function Product_promotion()
    {
        return $this->hasMany(ProductPromotion::class);
    }

    public function getEndDateAttribute($endDate) {
        return (new Carbon($endDate))->format('Y-m-d\H:i:s');
      }

    public function  products()
    {
        return $this->belongsToMany(Product::class);
    }

}  
