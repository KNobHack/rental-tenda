<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    function index(Request $request)
    {
        if ($request->has(['dari', 'sampai'])) {
            return view('dashboard.laporan.index', [
                'dari' => $request->dari,
                'sampai' => $request->sampai,
                'transaksi' => Transaksi::whereHas('rental', function (Builder $query) use ($request) {
                    $query->where('tgl_rental', '>=', $request->dari);
                    $query->where('tgl_kembali', '<=', $request->sampai);
                })->get()
            ]);
        } else {
            return view('dashboard.laporan.index');
        }
    }
}
