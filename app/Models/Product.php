<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name', 'desc', 'size', 'price', 'material',
        'style', 'waterproof', 'band_material',
        'warranty', 'gender', 'discount',
        'brand_id', 'category_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function image()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    public function getPriceAttribute($price)
    {
        return number_format($price, 0, '.', '.') . '₫';
    }
}
