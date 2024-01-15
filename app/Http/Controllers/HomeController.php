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

        $paket = $paket->map(function ($v) {
            $v->link_detail = route('sewa-detail-paket', $v->id);
            $v->link_keranjang = route('keranjang.tambah.paket', $v->id);
            return $v;
        });

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

        $tenda = $tenda->map(function ($v) {
            $v->link_detail = route('sewa-detail-tenda', $v->id);
            $v->link_keranjang = route('keranjang.tambah.tenda', $v->id);
            return $v;
        });

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

        $barang = $barang->map(function ($v) {
            $v->link_detail = route('sewa-detail-barang', $v->id);
            $v->link_keranjang = route('keranjang.tambah.barang', $v->id);
            return $v;
        });

        return view('home.sewa', [
            'title' => 'Sewa Barang',
            'item' => $barang
        ]);
    }

    public function detailPaket(Paket $paket)
    {
        return view('home.detail.paket', [
            'paket' => $paket,
        ]);
    }

    public function detailTenda(Tenda $tenda)
    {
        return view('home.detail.tenda', [
            'tenda' => $tenda,
        ]);
    }

    public function detailBarang(Barang $barang)
    {
        return view('home.detail.barang', [
            'barang' => $barang,
        ]);
    }
}
