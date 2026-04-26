<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id', 'name', 'slug', 'short_description', 'description',
        'price', 'sale_price', 'unit', 'images', 'video', 'video_file', 'sku',
        'stock', 'in_stock', 'featured', 'active', 'order',
    ];

    protected $casts = [
        'images'   => 'array',
        'in_stock' => 'boolean',
        'featured' => 'boolean',
        'active'   => 'boolean',
        'price'    => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function getFirstImageAttribute()
    {
        return $this->images ? $this->images[0] : null;
    }

    public function getDisplayPriceAttribute()
    {
        return $this->sale_price ?? $this->price;
    }
}
