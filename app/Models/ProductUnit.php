<?php

namespace App\Models;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductUnit extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function unit() : BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getDiscountAttribute()
    {
        $discount = $this->product->category->discount;
        $discount_percentage = $discount ? $discount->discount : 0;
        return $discount_percentage;
    }

    public function getDiscountAmountAttribute()
    {
        return $this->calcDiscount();
    }

    public function getPriceAttribute($price)
    {
        $discount = $this->calcDiscount();
        return $price - $discount;
    }

    protected function calcDiscount()
    {
        $discount = $this->attributes['price'] * $this->discount / 100;
        return $discount;
    }
}


