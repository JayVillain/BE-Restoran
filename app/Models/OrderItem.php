<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'menu_id',
        'qty',
        'subtotal',
    ];

    // Relasi: order_item milik 1 order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi: order_item berhubungan dengan 1 menu
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
