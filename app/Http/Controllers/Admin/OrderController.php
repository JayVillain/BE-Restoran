<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'table', 'items.menu'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'table', 'items.menu'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Sudah Bayar';
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Status pesanan diperbarui');
    }
}
