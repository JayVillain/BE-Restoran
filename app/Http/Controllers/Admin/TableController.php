<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantTable;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = RestaurantTable::all();
        return view('admin.tables.index', compact('tables'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_meja' => 'required',
            'kapasitas' => 'required|numeric',
        ]);

        RestaurantTable::create($request->all());
        return redirect()->route('admin.tables.index')->with('success', 'Meja berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $table = RestaurantTable::findOrFail($id);
        $table->update($request->all());
        return redirect()->route('admin.tables.index')->with('success', 'Meja berhasil diperbarui');
    }

    public function destroy($id)
    {
        RestaurantTable::destroy($id);
        return redirect()->route('admin.tables.index')->with('success', 'Meja berhasil dihapus');
    }
}
