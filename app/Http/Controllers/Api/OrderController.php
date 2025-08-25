<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Customer buat pesanan
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'table_id' => 'nullable|exists:restaurant_tables,id',
        ]);

        $total = 0;
        foreach ($request->items as $item) {
            $total += $item['qty'] * $item['harga'];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'table_id' => $request->table_id,
            'total' => $total,
            'status' => 'Belum Bayar',
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'],
                'qty' => $item['qty'],
                'subtotal' => $item['qty'] * $item['harga'],
            ]);
        }

        return response()->json(['message' => 'Pesanan berhasil dibuat', 'order' => $order]);
    }

    // Riwayat pesanan customer
    public function myOrders()
    {
        return response()->json(Order::where('user_id', auth()->id())->with('items.menu')->get());
    }
}
