<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Paket;
use App\Models\Tenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.paket.index', [
            'paket' => Paket::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.paket.create', [
            'tenda' => Tenda::all(),
            'barang' => Barang::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama'   => ['required'],
            'tenda'  => ['array'],
            'barang' => ['array'],
            'harga'  => ['required'],
            'denda'  => ['required'],
            'gambar' => ['required', 'image'],
        ])->validate();

        $tenda = collect($validated['tenda'])
            ->filter(function ($v) {
                return $v > 0;
            })->map(function ($v) {
                return ['jumlah' => $v];
            });
        $barang = collect($validated['barang'])
            ->filter(function ($v) {
                return $v > 0;
            })->map(function ($v) {
                return ['jumlah' => $v];
            });

        $gambar = $request->file('gambar');
        $gambar->store('/');

        $paket = new Paket();
        $paket->nama   = $validated['nama'];
        $paket->harga  = $validated['harga'];
        $paket->denda  = $validated['denda'];
        $paket->gambar = $gambar->hashName();
        $paket->save();

        $paket->tenda()->attach($tenda->toArray());
        $paket->barang()->attach($barang->toArray());

        return redirect()->route('paket.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Paket berhasil ditambahkan'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        return view('dashboard.paket.edit', [
            'paket' => $paket,
            'tenda' => Tenda::all(),
            'barang' => Barang::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        $validated = Validator::make($request->all(), [
            'nama'   => ['required'],
            'tenda'  => ['array'],
            'barang' => ['array'],
            'harga'  => ['required'],
            'denda'  => ['required'],
            'gambar' => ['image'],
        ])->validate();

        $tenda = collect($validated['tenda'])
            ->filter(function ($v) {
                return $v > 0;
            })->map(function ($v) {
                return ['jumlah' => $v];
            });
        $barang = collect($validated['barang'])
            ->filter(function ($v) {
                return $v > 0;
            })->map(function ($v) {
                return ['jumlah' => $v];
            });

        $paket->nama   = $validated['nama'];
        $paket->harga  = $validated['harga'];
        $paket->denda  = $validated['denda'];
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->store('/');
            $paket->gambar = $gambar->hashName();
        }
        $paket->save();

        $paket->tenda()->sync($tenda->toArray());
        $paket->barang()->sync($barang->toArray());

        return redirect()->route('paket.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Paket berhasil ditambahkan'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
        $paket->tenda()->detach();
        $paket->barang()->detach();
        $paket->delete();

        return redirect()->route('paket.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Paket berhasil dihapus'
            ]);
    }
}
