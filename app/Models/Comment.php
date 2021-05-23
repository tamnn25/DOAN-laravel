<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    ];

    protected $fillable = [
        'description',
        'rate',
        'user_id',
        'images',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
