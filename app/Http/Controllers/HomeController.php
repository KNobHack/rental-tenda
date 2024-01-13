<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Paket;
use App\Models\Tenda;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function beranda()
    {
        return view('home.beranda');
    }

    public function sewaPaket(Request $request)
    {
        if ($request->get('s')) {
            $paket = Paket::where('nama', 'like', "%{$request->get('s')}%")->get();
        } else {
            $paket = Paket::all();
        }
        return view('home.sewa', [
            'title' => 'Sewa Paket',
            'item' => $paket
        ]);
    }

    public function sewaTenda(Request $request)
    {
        if ($request->get('s')) {
            $tenda = Tenda::where('merek', 'like', "%{$request->get('s')}%")->get();
        } else {
            $tenda = Tenda::all();
        }

        return view('home.sewa', [
            'title' => 'Sewa Tenda',
            'item' => $tenda
        ]);
    }

    public function sewaBarang(Request $request)
    {
        if ($request->get('s')) {
            $barang = Barang::where('nama', 'like', "%{$request->get('s')}%")->get();
        } else {
            $barang = Barang::all();
        }
        return view('home.sewa', [
            'title' => 'Sewa Barang',
            'item' => $barang
        ]);
    }
}
