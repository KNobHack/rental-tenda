<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.barang.index', [
            'barang' => Barang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama' => ['required'],
            'harga' => ['required'],
            'denda' => ['required'],
            'gambar' => ['required', 'image'],
        ])->validate();

        $gambar = $request->file('gambar');
        $gambar->store('/');

        $barang = new Barang();
        $barang->nama = $validated['nama'];
        $barang->harga = $validated['harga'];
        $barang->denda = $validated['denda'];
        $barang->gambar = $gambar->hashName();
        $barang->save();

        return redirect()->route('barang.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Barang berhasil ditambahkan'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('dashboard.barang.edit', [
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validated = Validator::make($request->all(), [
            'nama' => ['required'],
            'harga' => ['required'],
            'denda' => ['required'],
            'gambar' => ['image'],
        ])->validate();

        $barang->nama = $validated['nama'];
        $barang->harga = $validated['harga'];
        $barang->denda = $validated['denda'];
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->store('/');
            $barang->gambar = $gambar->hashName();
        }
        $barang->save();

        return redirect()->route('barang.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Barang berhasil diedit'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Barang berhasil dihapus'
            ]);
    }
}
