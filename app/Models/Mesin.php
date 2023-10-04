<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;

    protected $table = 'mesin';

    protected $fillable = [
        'kode_mesin',
        'nama_mesin',
        'jenis_mesin',
    ];

    public function fotoMobil(){
        return $this->hasMany(FotoMobil::class, "jenis_mesin");
    }
}
