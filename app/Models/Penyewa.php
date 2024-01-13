<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Penyewa extends Model
{
    use HasFactory;

    protected $table = 'penyewa';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'gender',
        'no_telepon',
        'no_ktp',
    ];

    public function user(): Relation
    {
        return $this->belongsTo(User::class);
    }

    public function keranjangBarang(): Relation
    {
        return $this->belongsToMany(Barang::class, 'keranjang_barang');
    }

    public function keranjangTenda(): Relation
    {
        return $this->belongsToMany(Tenda::class, 'keranjang_tenda');
    }

    public function keranjangPaket(): Relation
    {
        return $this->belongsToMany(Paket::class, 'keranjang_paket');
    }
}
