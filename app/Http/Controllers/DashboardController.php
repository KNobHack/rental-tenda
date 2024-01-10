<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'tenda' => 0,
            'customers' => 0,
            'laporan' => 0,
            'transaksi' => 0,
        ]);
    }
}
