<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Blog;


class Blogdetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blog_detail';

    protected $fillable = [
        'image_detail',
        'blog_id',
    ];
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
