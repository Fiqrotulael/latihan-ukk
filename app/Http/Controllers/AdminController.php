<?php

namespace App\Http\Controllers;

use App\Models\Produk;


class AdminController extends Controller
{
    public function index (pendapatBulananChart $chart) 
    {
        $produkCount = Produk::count();
        return view('layouts.dashboard', ['produk_count' => $produkCount]);
    }
}