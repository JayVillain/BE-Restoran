<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    // List semua menu (untuk customer)
    public function index()
    {
        return response()->json(Menu::all());
    }
}
