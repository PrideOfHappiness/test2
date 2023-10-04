<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarFotoMobil extends Model
{
    use HasFactory;

    protected $table = 'gambar_foto';

    protected $fillable = [
        'mobil_id',
        'namaFile',
    ];

    public function FotoMobil(){
        return $this->belongsTo(FotoMobil::class, "mobil_id");
    }
}
