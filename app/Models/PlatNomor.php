<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatNomor extends Model
{
    use HasFactory;

    protected $table = 'plat_nomor';

    protected $fillable = [
        'kode_negara',
        'nama_negara',
        'issueing',
        'keterangan',
        'namaFile',
    ];

    public function cekKetersediaanNegara($nama){
        $originalName = $nama;
        $number = 1;

        while($this->where('nama_negara', $nama)->exists()){
            $nama = $originalName . ' (' . $number . ')';
            $number++;
        }

        $this->nama = $nama;
        $this->save();
    }
}
