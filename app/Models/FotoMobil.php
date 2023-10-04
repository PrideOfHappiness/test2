<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoMobil extends Model
{
    use HasFactory;

    protected $table = 'foto_mobil';

    protected $fillable = [
        'kode_foto',
        'merk_mobil',
        'nama_mobil',
        'nama_tipe',
        'kode_bodi',
        'plat_nomor',
        'jenis_mobil',
        'jenis_mesin',
        'ukuran',
        'letak_setir',
        'merk_mobil',
        'part',
        'user_id',
    ];

    //HasMany
    public function GambarFotoMobil(){
        return $this->hasMany(GambarFotoMobil::class, "mobil_id");
    }

    //BelongsTo
    public function jenis(){
        return $this->belongsTo(Jenis::class, "jenis_mobil");
    }

    public function karakter(){
        return $this->belongsTo(Karakter::class, "ukuran");
    }

    public function plat_nomor(){
        return $this->belongsTo(PlatNomor::class, "plat_nomor");
    }

    public function mesin(){
        return $this->belongsTo(Mesin::class, "jenis_mesin");
    }

    public function letak_setir(){
        return $this->belongsTo(DrivingLocation::class, "letak_setir");
    }

    public function merek(){
        return $this->belongsTo(Merk::class, "merk_mobil");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }
    
}
