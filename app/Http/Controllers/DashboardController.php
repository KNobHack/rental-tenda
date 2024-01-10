<?php

namespace App\Http\Controllers;

use App\Models\Tenda;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'tenda' => Tenda::count(),
            'customers' => User::where('role_id', 2)->count(),
            'transaksi' => Transaksi::count(),
            'laporan' => Transaksi::whereHas('rental', function ($query) {
                $query->where('rental_selesai', true);
            })->count(),
        ]);
    }
}
