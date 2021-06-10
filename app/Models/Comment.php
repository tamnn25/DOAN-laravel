<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comments';

    /**
     * Define variable STATUS
     * 0: chưa hài lòng 
     * 1: chưa tốt
     * 2: tạm hài lòng
     * 3: hài lòng
     * 4: hoàn hảo
     */
    public const STATUS = [
        0,
        1,
        2,
        3,
        4,
        5,
    ];

    protected $fillable = [
        'description',
        'rate',
        'user_id',
        'images',
        'product_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function startReview($product_id)
    {
       $query = Comment::where('product_id', $product_id); // lấy  giá trị sản phẩm   comment
       $count_review = $query->count();  // đếm  có boa nhiêu   sản phẩm comment đc đánh giá   bao nhiêu sao
       if ($count_review != 0) {
          $sum = $query->sum('rate');                                      
          return $sum/$count_review;
          
       }
       return 0;  // ngược lại   trả về o
    }
}
