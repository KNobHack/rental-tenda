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

    public function paket(): Relation
    {
        return $this->belongsToMany(Paket::class);
    }

    public function tenda(): Relation
    {
        return $this->belongsToMany(Tenda::class);
    }

    public function barang(): Relation
    {
        return $this->belongsToMany(Barang::class);
    }

    public function transaksi(): Relation
    {
        return $this->hasOne(Transaksi::class);
    }
}
