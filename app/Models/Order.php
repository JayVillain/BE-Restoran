<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'table_id',
        'total',
        'status',
    ];

    // Relasi: order dimiliki oleh 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: order bisa punya banyak item
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi: order milik 1 meja (optional)
    public function table()
    {
        return $this->belongsTo(RestaurantTable::class, 'table_id');
    }
}
