<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrivingLocation;
use Illuminate\Support\Str;

class LetakSetirController extends Controller
{
    public function index(){
        $data = DrivingLocation::all();
        return view('setir.index', compact('data'));
    }

    public function indexUsers(){
        $location = DrivingLocation::all();
        return view('setir.indexUsers', compact('location'));
    }

    public function create(){
        return view('setir.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'fotoDashboard' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $letakSetir = $request->status;
        $angkaAcak = rand(1,99);
        $karakter1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $karakter = [];

        if($request->hasFile('fotoDashboard')){
            $foto = $request->file('fotoDashboard');
            $namaFile = $foto->getClientOriginalName();
            $foto->move('foto/letakSetir/', $namaFile);
        }

        for($i = 0; $i < 26; $i++){
            $char1 = $karakter1[$i];
            for($j = 0; $j < 26; $j++){
                $char2 = $karakter1[$j];
                for($k = 0; $k < 26; $k++){
                    $char3 = $karakter1[$k];
                    $karakter[] = $char1 . $char2 . $char3;
                }
            }
        }

        shuffle($karakter);
        $karakterJadi = $karakter[array_rand($karakter)];

        if($letakSetir){
            $kode = strtoupper(substr($letakSetir, 0, 2)) . $angkaAcak . ' ' . $karakterJadi;
        }else{
            return redirect()->route('setir.create')
            ->with('error', 'Data belum lengkap! Silahkan isi data terlebih dahulu. ');
        }
        $location = DrivingLocation::create([
            'kode' => $kode,
            'location' => $letakSetir,
            'namaFile' => $namaFile,
        ]);

        return redirect()->route('setir.index')
            ->with('success', 'Data letak setir ' . $letakSetir .' berhasil ditambahkan!');
    }
}
