<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    const STATUS_AVAILABLE = 'available';
    const STATUS_UNAVAILABLE = 'unavailable';

    const STATUS = [
        self::STATUS_AVAILABLE,
        self::STATUS_UNAVAILABLE,
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function units() : HasMany
    {
        return $this->hasMany(ProductUnit::class);
    }

    public function image(){
        if($this->image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL")."/uploads/products/".$this->image;
    }
}
