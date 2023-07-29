<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodePlatNomor extends Model
{
    use HasFactory;

    protected $table = 'daftar_negara';

    protected $fillable = [
        'nama_negara',
        'kode_registrasi_negara',
    ];
}
