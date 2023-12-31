<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karakter extends Model
{
    use HasFactory;

    protected $table = 'ukuran_karakter';

    protected $fillable = [
        'kode',
        'ukuran',
        'namaFile',
    ];

    public function FotoMobil(){
        return $this->hasMany(FotoMobil::class, "ukuran");
    }
}
