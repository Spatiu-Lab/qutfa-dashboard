<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title'];

    public $guarded=['id','created_at','updated_at'];

    public $appends=['url'];

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getUrlAttribute(){
        return route('category.show',$this);
    }

    public function articles(){
        return $this->belongsToMany(\App\Models\Article::class,'article_categories');
    }

    public function image(){
       if($this->image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL")."/uploads/categories/".$this->image;
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}
