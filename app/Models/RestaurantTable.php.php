<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantTable extends Model
{
    use HasFactory;

    protected $table = 'restaurant_tables'; // 🔑 wajib biar sesuai nama tabel

    protected $fillable = [
        'nomor_meja',
        'kapasitas',
        'status',
    ];

    // Relasi: 1 meja bisa punya banyak order
    public function orders()
    {
        return $this->hasMany(Order::class, 'table_id');
    }
}
