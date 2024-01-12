<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';
    public $timestamps = false;

    public function rental(): Relation
    {
        return $this->belongsToMany(Rental::class);
    }

    public function tenda(): Relation
    {
        return $this->belongsToMany(Tenda::class);
    }

    public function barang(): Relation
    {
        return $this->belongsToMany(Barang::class);
    }
}
