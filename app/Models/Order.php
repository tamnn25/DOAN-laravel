<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\OrderDetail;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    const RECORD_LIMIT = 10;

    protected $table = 'orders';

    /**
     * Define variable STATUS
     * 0: đã tạo đơn hàng và chưa thanh toán 
     * 1: đã tạo đơn và đã thanh toán online
     * 2: (shipping) shipper đang đi giao hàng
     * 3: (cancel) đơn hàng bị hủy do lỗi kỹ thuật hoặc một lý do khác
     * 4: (finished) Hoàn thành
     */
    public const STATUS = [
        0,
        1,
        2,
        3,
        4,
    ];

    protected $fillable = [
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    /**
     * one Order only hasMany Order_Detail
     */
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    
}
