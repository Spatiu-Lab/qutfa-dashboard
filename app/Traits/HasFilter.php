<?php

namespace App\Traits;

use Carbon\Carbon;

trait HasFilter
{
    /**
     * Scope a query to  include filters .
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query)
    {
        return $query
        ->when(request()->name && request()->name  , fn () => $query->where('name', request()->name))
        ->when(request()->address && request()->address  , fn () => $query->where('address', request()->address))
        ->when(request()->department && request()->department != "all" , fn () => $query->where('department_id', request()->department))
        ->when(request()->status && request()->status != "all" , fn () => $query->where('status', request()->status))
        ->when(request()->from || request()->to , fn () => $query->whereBetween(request()->columns['column_date'] ?? 'created_at', $this->getDate()));
    }

    public function getDate()
    {
        $from = request()->from ? Carbon::parse(request()->from)->startOfDay()  : Carbon::parse(now())->startOfDay();
        $to = request()->to ? Carbon::parse(request()->to)->endOfDay() :  Carbon::parse(now())->endOfDay();

        return [$from, $to];
    }
}
