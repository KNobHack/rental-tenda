<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    public $timestamps = false;

    public function barang(): Relation
    {
        return $this->belongsToMany(Barang::class, 'keranjang_barang')
            ->as('keranjang_barang')
            ->withPivot(['jumlah']);
    }

    public function tenda(): Relation
    {
        return $this->belongsToMany(Tenda::class, 'keranjang_tenda')
            ->as('keranjang_tenda')
            ->withPivot(['jumlah']);
    }

    public function paket(): Relation
    {
        return $this->belongsToMany(Paket::class, 'keranjang_paket')
            ->as('keranjang_paket')
            ->withPivot(['jumlah']);
    }

    public function penyewa(): Relation
    {
        return $this->belongsTo(Penyewa::class);
    }
}
