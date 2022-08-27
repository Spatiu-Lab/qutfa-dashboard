<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductUnit;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;

    const STATUS_AVAILABLE = 'available';
    const STATUS_UNAVAILABLE = 'unavailable';

    const STATUS = [
        self::STATUS_AVAILABLE,
        self::STATUS_UNAVAILABLE,
    ];

    public $translatable = ['name'];

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
