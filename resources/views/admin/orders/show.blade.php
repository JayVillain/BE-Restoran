@extends('admin.layout')

@section('content')
<h2>Detail Pesanan #{{ $order->id }}</h2>

<p><strong>Customer:</strong> {{ $order->user->username }}</p>
<p><strong>Meja:</strong> {{ $order->table ? $order->table->nomor_meja : 'Take Away' }}</p>
<p><strong>Total:</strong> Rp{{ number_format($order->total, 0, ',', '.') }}</p>
<p><strong>Status:</strong> {{ $order->status }}</p>

<h4>Item Pesanan</h4>
<table class="table table-bordered">
    <tr>
        <th>Menu</th>
        <th>Qty</th>
        <th>Subtotal</th>
    </tr>
    @foreach($order->items as $item)
    <tr>
        <td>{{ $item->menu->nama_menu }}</td>
        <td>{{ $item->qty }}</td>
        <td>Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
    </tr>
    @endforeach
</table>

<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
