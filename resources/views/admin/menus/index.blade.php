.@extends('admin.layout')

@section('content')
<h2>Daftar Menu</h2>
<a href="{{ route('admin.menus.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    @foreach($menus as $menu)
    <tr>
        <td>{{ $menu->id }}</td>
        <td>{{ $menu->nama_menu }}</td>
        <td>Rp{{ number_format($menu->harga, 0, ',', '.') }}</td>
        <td>
            <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
