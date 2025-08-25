@extends('admin.layout')

@section('content')
<h2>Daftar Pesanan</h2>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Meja</th>
        <th>Total</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    @foreach($orders as $order)
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->user->username }}</td>
        <td>{{ $order->table ? $order->table->nomor_meja : '-' }}</td>
        <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
        <td>{{ $order->status }}</td>
        <td>
            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">Detail</a>
            @if($order->status == 'Belum Bayar')
            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-inline">
                @csrf @method('PUT')
                <button class="btn btn-success btn-sm">Tandai Sudah Bayar</button>
            </form>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection
