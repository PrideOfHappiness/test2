<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'merk';

    protected $fillable = [
        'kode_merk',
        'nama_merk',
        'no_urut',
        'jenis_merek',
    ];

    public function searchMerek($kata_kunci){
        return $this->where('nama_merk', 'LIKE', '%' . $kata_kunci . '%')->get();
    }

    public function fotoMobil(){
        return $this->hasMany(FotoMobil::class, "merk_mobil");
    }
}
