<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rental';
    public $timestamps = false;

    public function penyewa(): Relation
    {
        return $this->belongsTo(Penyewa::class);
    }

    public function paket(): Relation
    {
        return $this->belongsToMany(Paket::class)
            ->as('rental_paket')
            ->withPivot(['jumlah']);
    }

    public function tenda(): Relation
    {
        return $this->belongsToMany(Tenda::class)
            ->as('rental_tenda')
            ->withPivot(['jumlah']);
    }

    public function barang(): Relation
    {
        return $this->belongsToMany(Barang::class, 'rental_barang')
            ->as('rental_barang')
            ->withPivot(['jumlah']);
    }

    public function transaksi(): Relation
    {
        return $this->hasOne(Transaksi::class);
    }
}
