<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RestaurantTable;

class TableController extends Controller
{
    // List semua meja aktif
    public function index()
    {
        return response()->json(RestaurantTable::where('status', true)->get());
    }
}
