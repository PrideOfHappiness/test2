<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesin;
use Illuminate\Support\Str;

class MesinController extends Controller
{
    public function index(){
        $mesin = Mesin::all();
        return view('mesin.index', compact('mesin'));
    }

    public function index_users(){
        $mesin = Mesin::all();
        return view('mesin.indexUsers', compact('mesin'));
    }

    public function create(){
        return view('mesin.create');
    }
    
    public function store(Request $request){
        $nama_mesin = $request->nama_mesin;
        $kategori = $request->status;
        $acak = strtoupper(Str::random(3));
        $jumlahKataMesin = str_word_count($nama_mesin);

        if($jumlahKataMesin === 1){
            $singkatan = substr($nama_mesin, 0, 3);
        }else{
            $kata = explode(' ', $nama_mesin);
            
            $ambil_karakter_pertama = array_map(function ($kata_pertama){
                return substr($kata_pertama, 0, 1);
            }, $kata);

            $singkatan = implode("", $ambil_karakter_pertama);
        }

        if($kategori == 'ICE'){
            $karakterAwal = 'ICE';
            $kode_mesin = $karakterAwal . strtoupper($singkatan) . $acak;
            $status = 'Internal Combustion Engine';
        }elseif ($kategori == 'ELE') {
            $karakterAwal = 'ELE';
            $kode_mesin = $karakterAwal . strtoupper($singkatan) . $acak;
            $status = 'Electrified engine';
        }else{
            return redirect()->route('mesin.create')
                ->with('error', 'Data belum lengkap! Silahkan isi data terlebih dahulu. ');
        }

        $mesin = Mesin::create([
            'kode_mesin' => $kode_mesin,
            'nama_mesin' => $nama_mesin,
            'jenis_mesin' => $status,
        ]);

        return redirect()->route('mesin.index')
            ->with('success', "Data berhasil ditambahkan!");
    }
}
