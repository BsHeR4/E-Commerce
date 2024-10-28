<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'brand',
        'description',
        'price',
        'amount',
        'image_path',
        'availability',
      
    ];

    public function categories()
    {   //withTimestamps() to make sure the created_at and updated_at are set                                                                  
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id')->withTimestamps();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
