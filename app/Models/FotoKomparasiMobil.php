<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoKomparasiMobil extends Model
{
    use HasFactory;

    protected $table = 'foto_mobil_komparasi';

    protected $fillable = [
        'kode_gambar',
        'kode_jenis_mobil1',
        'kode_jenis_mobil2',
        'kode_jenis_mobil3',
        'kode_jenis_mobil4',
        'kode_mesin_mobil1',
        'kode_mesin_mobil2',
        'kode_mesin_mobil3',
        'kode_mesin_mobil4',
        'plat_nomor_mobil1',
        'plat_nomor_mobil2',
        'plat_nomor_mobil3',
        'plat_nomor_mobil4',
        'merek_mobil1',
        'merek_mobil2',
        'merek_mobil3',
        'merek_mobil4',
        'ukuran_karakter_mobil1',
        'ukuran_karakter_mobil2',
        'ukuran_karakter_mobil3',
        'ukuran_karakter_mobil4',
        'letak_setir_mobil1',
        'letak_setir_mobil2',
        'letak_setir_mobil3',
        'letak_setir_mobil4',
        'mobil1',
        'mobil2',
        'mobil3',
        'mobil4',
        'id_penggungah',
    ];

    //Jenis
    public function jenis_1(){
        return $this->belongsTo(Jenis::class, "kode_jenis_mobil_1");
    }

    public function jenis_2(){
        return $this->belongsTo(Jenis::class, "kode_jenis_mobil_2");
    }

    public function jenis_3(){
        return $this->belongsTo(Jenis::class, "kode_jenis_mobil_3");
    }

    public function jenis_4(){
        return $this->belongsTo(Jenis::class, "kode_jenis_mobil_4");
    }

    //Mesin
    


}
