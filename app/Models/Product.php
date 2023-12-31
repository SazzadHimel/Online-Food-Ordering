<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'main_price',
        'discounted_price',
        'quantity',
        'popular',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
}
