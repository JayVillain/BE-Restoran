@extends('admin.layout')

@section('content')
<h2>Manajemen Meja</h2>

<form action="{{ route('admin.tables.store') }}" method="POST" class="mb-3">
    @csrf
    <div class="row">
        <div class="col">
            <input type="text" name="nomor_meja" class="form-control" placeholder="Nomor Meja">
        </div>
        <div class="col">
            <input type="number" name="kapasitas" class="form-control" placeholder="Kapasitas">
        </div>
        <div class="col">
            <button class="btn btn-primary">Tambah</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nomor Meja</th>
        <th>Kapasitas</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    @foreach($tables as $table)
    <tr>
        <td>{{ $table->id }}</td>
        <td>{{ $table->nomor_meja }}</td>
        <td>{{ $table->kapasitas }}</td>
        <td>{{ $table->status ? 'Aktif' : 'Nonaktif' }}</td>
        <td>
            <form action="{{ route('admin.tables.destroy', $table->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
