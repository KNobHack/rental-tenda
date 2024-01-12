<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.customer.index', [
            'customer' => User::where('role_id', 2)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'no_telepon' => ['required'],
            'no_ktp' => ['required', 'numeric'],
            'password' => ['required', 'string', Password::default(), 'confirmed'],
        ])->validate();

        $user = User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role_id'  => 2,
        ]);

        Penyewa::create([
            'user_id' => $user->id,
            'nama' => $validated['nama'],
            'alamat' => $validated['alamat'],
            'gender' => $validated['gender'],
            'no_telepon' => $validated['no_telepon'],
            'no_ktp' => $validated['no_ktp'],
        ]);

        return redirect()->route('customer.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Customer berhasil ditambahkan'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer)
    {
        return view('dashboard.customer.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $customer)
    {
        $validated = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'no_telepon' => ['required'],
            'no_ktp' => ['required', 'numeric'],
            'password' => ['confirmed'],
        ])->validate();

        $customer->username = $validated['username'];
        if ($validated['password'] ?? false) {
            $customer->username = $validated['username'];
        }

        $customer->penyewa->nama = $validated['nama'];
        $customer->penyewa->alamat = $validated['alamat'];
        $customer->penyewa->gender = $validated['gender'];
        $customer->penyewa->no_telepon = $validated['no_telepon'];
        $customer->penyewa->no_ktp = $validated['no_ktp'];
        $customer->penyewa->save();

        return redirect()->route('customer.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Customer berhasil diedit'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer)
    {
        $customer->penyewa->delete();
        $customer->delete();

        return redirect()->route('customer.index')
            ->with('alert', [
                'mode' => 'success',
                'message' => 'Customer berhasil dihapus'
            ]);
    }
}
