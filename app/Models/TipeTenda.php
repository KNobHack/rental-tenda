<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class TipeTenda extends Model
{
    use HasFactory;

    protected $table      = 'tipe_tenda';
    protected $primaryKey = 'kode';
    public $timestamps    = false;
    public $incrementing  = false;

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function tendas(): Relation
    {
        return $this->hasMany(Tenda::class, 'kode_tipe', 'kode');
    }
}
