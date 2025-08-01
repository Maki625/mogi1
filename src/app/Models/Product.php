<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_image',
        'brand_name',
        'product_condition',
        'price',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorite_product');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function purchase()
{
    return $this->hasOne(Purchase::class, 'product_id');
}

    public function getIsSoldOutAttribute()
    {
       return $this->purchase !== null;
    }
}
