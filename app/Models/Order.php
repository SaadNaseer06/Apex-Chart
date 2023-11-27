<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_name',
        'quantity',
        'total_amount'
    ];
    public function scopeGroupByMonth(Builder $query)
    {
        return $query->selectRaw('month(created_at) as month')
            ->selectRaw('count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->values()
            ->toArray();
    }
}
