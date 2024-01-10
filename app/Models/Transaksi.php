<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Transaksi extends Model
{
    use HasFactory;

    protected $table   = 'transaksi';
    public $timestamps = false;

    public function rental(): Relation
    {
        return $this->belongsTo(Rental::class);
    }
}
