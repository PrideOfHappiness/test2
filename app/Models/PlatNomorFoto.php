<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatNomorFoto extends Model
{
    use HasFactory;

    protected $table='plat_nomor_foto';

    protected $fillable = [
        'plat_id',
        'namaFile',
    ];

    public function platNomor(){
        return $this->belongsTo(PlatNomor::class, "plat_id");
    }
}
