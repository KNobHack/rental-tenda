<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Tenda extends Model
{
    use HasFactory;

    protected $table   = 'tenda';
    public $timestamps = false;

    public function tipe(): Relation
    {
        return $this->belongsTo(TipeTenda::class, 'kode_tipe', 'kode');
    }

    public function rental(): Relation
    {
        return $this->belongsToMany(Rental::class);
    }
}
