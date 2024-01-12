<?php

namespace App\Http\Controllers;

use App\Models\TipeTenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipeTendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.tipe_tenda.index', [
            'tipe' => TipeTenda::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tipe_tenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'kode' => ['required'],
            'nama' => ['required'],
        ])->validate();

        TipeTenda::create($validated);

        return redirect()->route('tipe_tenda.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Tipe tenda berhasil ditambahkan'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipeTenda $tipe_tenda)
    {
        return view('dashboard.tipe_tenda.edit', [
            'tipe' => $tipe_tenda,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipeTenda $tipe_tenda)
    {
        $validated = Validator::make($request->all(), [
            'nama' => ['required'],
        ])->validate();

        $tipe_tenda->nama = $validated['nama'];
        $tipe_tenda->save();

        return redirect()->route('tipe_tenda.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Tipe tenda berhasil diupdate'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipeTenda $tipe_tenda)
    {
        $tipe_tenda->delete();

        return redirect()->route('tipe_tenda.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Tipe tenda berhasil dihapus'
            ]);
    }
}
