<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karakter;
use Illuminate\Support\Str;

class UkuranKarakterController extends Controller
{
    public function index(){
        $ukuranKarakter = Karakter::all();
        return view('ukuranKarakter.index', compact('ukuranKarakter'));
    }

    public function indexUsers(){
        $ukuranKarakter = Karakter::all();
        return view('ukuranKarakter.indexUsers', compact('ukuranKarakter'));
    }

    public function create(){
        return view('ukurankarakter.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'fotoKarakter' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $karakter1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $karakter = $request->status;
        $acak = rand(100,999);

        if($karakter == 'Panjang'){
            $kode = strtoupper(substr($karakter, 0, 3)) . $karakter1[rand(0, strlen($karakter1) - 1)] .' ' . $acak;
            $ukuran = 'Panjang';
        }elseif($karakter == 'Pendek'){
            $kode = strtoupper(substr($karakter, 0, 3)) . ' ' . $acak;
            $ukuran = 'Pendek';
        }else{
            return redirect()->route('ukuranKarakter.create')
                ->with('error', 'Data belum lengkap! Silahkan isi data terlebih dahulu.');
        }

        if($request->hasFile('fotoKarakter')){
            $foto = $request->file('fotoKarakter');
            $namaFile = $foto->getClientOriginalName();
            $foto->move('foto/ukuran/', $namaFile);
        }
        
        $ukuranKarakter = Karakter::create([
            'kode' => $kode,
            'ukuran' => $ukuran,
            'namaFile' => $namaFile,
        ]);

        return redirect()->route('ukuranKarakter.index')
            ->with('success', 'Data ukuran berhasil ditambahkan!');
    }
}
