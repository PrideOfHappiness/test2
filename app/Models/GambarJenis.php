<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarJenis extends Model
{
    use HasFactory;

    protected $table='gambar_jenis';

    protected $fillable = [
        'jenis_id',
        'namaFile',
    ];

    public function jenis(){
        return $this->belongsTo(Jenis::class, "jenis_id");
    }
}
