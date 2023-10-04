<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrivingLocation;
use App\Models\FotoMobil;
use App\Models\Jenis;
use App\Models\Karakter;
use App\Models\Merk;
use App\Models\Mesin;
use App\Models\PlatNomor;
use App\Models\User;
use App\Models\GambarFotoMobil;

class FotoMobilController extends Controller
{
    public function index(){
        $data = FotoMobil::paginate(20);
        $foto = GambarFotoMobil::with('GambarFotoMobil')->get();
        $platNomor = FotoMobil::join('plat_nomor', 'foto_mobil.plat_nomor', '=', 'plat_nomor.id')
            ->selectRaw("plat_nomor.id, plat_nomor.nama_negara, plat_nomor.for,concat
                (plat_nomor.nama_negara, '-', plat_nomor.for) as platnomors")
            ->get();
        return view('fotoMobil.index', compact('data', 'foto', 'platNomor'));
    }

    public function create(){
        $dataSetir = DrivingLocation::selectRaw("id, location")->get();
        $dataJenis = Jenis::selectRaw("id, nama_jenis")->orderBy("nama_jenis")->get();
        $dataKarakter = Karakter::selectRaw("id, ukuran")->orderBy("ukuran")->get();
        $dataMerk = Merk::selectRaw("id, nama_merk, jenis_merek, concat(merk.nama_merk, ' - ' , merk.jenis_merek) as merek")
            ->orderBy("merek")->get();
        $dataMesin = Mesin::selectRaw("id, nama_mesin")->orderBy("nama_mesin")->get();
        $dataPlatNomor = PlatNomor::selectRaw("plat_nomor.id, plat_nomor.nama_negara, plat_nomor.for, 
            concat(plat_nomor.nama_negara, ' - ' , plat_nomor.for) as platnomors")
            ->orderBy("platnomors")->get();
        return view('fotoMobil.create', compact('dataSetir', 'dataJenis', 'dataKarakter', 'dataMerk', 'dataMesin', 'dataPlatNomor'));
    }

    public function store(Request $request){
    }

    public function show($id){

    }

    public function showUsers($id){

    }

    public function edit($id){
        $dataAwal = FotoMobil::find($id);
    }

    public function update($id, Request $request){
        $dataAwal = FotoMobil::find($id);
    }
}
