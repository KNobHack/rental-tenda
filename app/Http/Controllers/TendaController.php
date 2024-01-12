<?php

namespace App\Http\Controllers;

use App\Models\Tenda;
use App\Models\TipeTenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.tenda.index', [
            'tenda' => Tenda::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tenda.create', [
            'tipe' => TipeTenda::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'kode_tipe' => ['required'],
            'merek' => ['required'],
            'kapasitas' => ['required'],
            'warna' => ['required'],
            'status' => ['required'],
            'harga' => ['required'],
            'denda' => ['required'],
            'gambar' => ['required', 'image'],
        ])->validate();

        $gambar = $request->file('gambar');
        $gambar->store('/');

        $tenda = new Tenda();
        $tenda->kode_tipe = $validated['kode_tipe'];
        $tenda->merek = $validated['merek'];
        $tenda->kapasitas = $validated['kapasitas'];
        $tenda->warna = $validated['warna'];
        $tenda->tersedia = $validated['status'];
        $tenda->harga = $validated['harga'];
        $tenda->denda = $validated['denda'];
        $tenda->gambar = $gambar->hashName();
        $tenda->save();

        return redirect()->route('tenda.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Tenda berhasil ditambahkan'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenda $tenda)
    {
        return view('dashboard.tenda.show', [
            'tenda' => $tenda,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenda $tenda)
    {
        return view('dashboard.tenda.edit', [
            'tenda' => $tenda,
            'tipe' => TipeTenda::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenda $tenda)
    {
        $validated = Validator::make($request->all(), [
            'kode_tipe' => ['required'],
            'merek' => ['required'],
            'kapasitas' => ['required'],
            'warna' => ['required'],
            'status' => ['required'],
            'harga' => ['required'],
            'denda' => ['required'],
            'gambar' => ['image'],
        ])->validate();

        $tenda->kode_tipe = $validated['kode_tipe'];
        $tenda->merek = $validated['merek'];
        $tenda->kapasitas = $validated['kapasitas'];
        $tenda->warna = $validated['warna'];
        $tenda->tersedia = $validated['status'];
        $tenda->harga = $validated['harga'];
        $tenda->denda = $validated['denda'];
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->store('/');
            $tenda->gambar = $gambar->hashName();
        }
        $tenda->save();

        return redirect()->route('tenda.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Tenda berhasil diedit'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenda $tenda)
    {
        $tenda->delete();

        return redirect()->route('tenda.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Tenda berhasil dihapus'
            ]);
    }
}
