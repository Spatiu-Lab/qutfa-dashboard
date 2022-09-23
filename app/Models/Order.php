<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\HasFilter;
class Order extends Model
{
    use HasFactory, HasFilter;

    const STATUS_WAITTING   = "waitting";
    const STATUS_ACCPETED   = "accepted";
    const STATUS_DELIVERY   = "delivery";
    const STATUS_DELIVERED  = "delivered";

    const STATUS = [
        self::STATUS_WAITTING   => 'في الانتظار',
        self::STATUS_ACCPETED   => 'قيد التحضير',
        self::STATUS_DELIVERY   => 'في الطريق',
        self::STATUS_DELIVERED  => 'تم التوصيل',
    ];

    public $guarded=['id','created_at','updated_at'];


    public function products() : HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderLogs() {
        return $this->hasMany(OrderLog::class);
    }
}
