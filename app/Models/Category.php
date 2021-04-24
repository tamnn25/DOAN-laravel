<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id'
    ];

    /**
     * Get the posts for the category.
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
