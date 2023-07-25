<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table='jenis';

    protected $fillable = [
        'kode_jenis',
        'nama_jenis',
        'keterangan',
    ];

    public function GambarJenis(){
        return $this->hasMany(GambarJenis::class, "jenis_id");
    }
}
