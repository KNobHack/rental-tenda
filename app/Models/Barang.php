<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    public $timestamps = false;

    public function rental(): Relation
    {
        return $this->belongsToMany(Rental::class);
    }

    public function paket(): Relation
    {
        return $this->belongsToMany(Paket::class);
    }
}
