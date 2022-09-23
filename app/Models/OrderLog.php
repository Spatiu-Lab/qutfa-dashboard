<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderLog extends Model
{
    use HasFactory;

    public $guarded=['id','created_at','updated_at'];

    public function order() :BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }
}
