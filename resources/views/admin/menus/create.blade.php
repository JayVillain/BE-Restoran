@extends('admin.layout')

@section('content')
<h2>Tambah Menu</h2>

<form action="{{ route('admin.menus.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Menu</label>
        <input type="text" name="nama_menu" class="form-control">
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control">
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection
