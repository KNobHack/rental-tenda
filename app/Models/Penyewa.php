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

    function keranjang(): Relation
    {
        return $this->hasOne(Keranjang::class);
    }

    public function rental(): Relation
    {
        return $this->hasMany(Rental::class);
    }
}
