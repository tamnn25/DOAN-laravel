<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Blogdetail;


class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'blog';

    protected $fillable = [
            'name',
            'image',
            'content',
            'description',
    ];

    public  function blog_detail()
    {
        return $this->hasMany(Blogdetail::class);
        
    }
}
