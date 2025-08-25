<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'harga',
        'deskripsi',
        'gambar',
    ];

    // Relasi: 1 menu bisa masuk ke banyak order_items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
