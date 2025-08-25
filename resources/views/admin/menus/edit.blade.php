@extends('admin.layout')

@section('content')
<h2>Edit Menu</h2>

<form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama Menu</label>
        <input type="text" name="nama_menu" class="form-control" value="{{ $menu->nama_menu }}">
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="{{ $menu->harga }}">
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ $menu->deskripsi }}</textarea>
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
