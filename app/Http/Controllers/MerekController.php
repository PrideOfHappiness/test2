<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Merk;
use Illuminate\Support\Str;

class MerekController extends Controller
{
    public function index(){
        $merek = Merk::orderBy('nama_merk', 'asc')->paginate(20);
        $jumlahMerek = Merk::orderBy('nama_merek', 'asc')->count();
        return view('merek.index', compact('merek', 'jumlahMerek'));
    }

    public function index_users(){
        $merek = Merk::orderBy('nama_merk', 'asc')->paginate(20);
        $jumlahMerek = Merk::orderBy('nama_merek', 'asc')->count();
        return view('merek.indexUsers', compact('merek', 'jumlahMerek'));
    }

    public function create(){
        return view('merek.create');
    }

    public function store(Request $request){
        $merek1 = $request->nama_merk;
        $existingMerek = Merk::where('nama_merk', $merek1)->first();
        $kodeMerek = ''; 
        $karakterAcak = strtoupper(Str::random(3));
        $jenis_merek = '';

        if ($request->input('jenis_merek') == 'P') {
            if ($existingMerek) {
                $lastNumber = $existingMerek->nomor_urut + 1;
                $kodeMerek = 'PC1' . $lastNumber . strtoupper(substr($merek1, 0, 3)) . $karakterAcak;
                $jenis_merek = 'Passenger Vehicles';
            } else {
                $kodeMerek .= 'PC1' . strtoupper(substr($merek1, 0, 3)) . $karakterAcak;
                $lastNumber = 1;
                $jenis_merek = 'Passenger Vehicles';
            }
        } elseif ($request->input('jenis_merek') == 'C') {
            $jenis_merek = '';
            if ($existingMerek) {
                $lastNumber = $existingMerek->nomor_urut + 1;
                $kodeMerek = 'CV0' . $lastNumber . strtoupper(substr($merek1, 0, 3)) . $karakterAcak;
                $jenis_merek = 'Commercial Vehicles';
            } else {
                $kodeMerek .= 'CV0' . strtoupper(substr($merek1, 0, 3)) . $karakterAcak;
                $lastNumber = 1;
                $jenis_merek = 'Commercial Vehicles';
            }
        } elseif($jenis_merek != 'P' && $jenis_merek != 'C'){
            return redirect()->route('merek.create')
                ->with('error', 'Jenis merek belum dipilih! Silahkan isi jenis merek terlebih dahulu.');
        }else{
            return redirect()->route('merek.create')
                ->with('error', 'Data belum lengkap! Silahkan isi data terlebih dahulu.');
        }

        $merek = Merk::create([
            'kode_merk' => $kodeMerek,
            'nama_merk' => $merek1,
            'no_urut' => $lastNumber,
            'jenis_merek' => $jenis_merek,
        ]);

        return redirect()->route('merek.index')
            ->with('success', 'Data Merek ' . $merek1 . ', Jenis: ' . $jenis_merek . ' berhasil ditambahkan!');
    }
    
    public function search(Request $request){
        $kata_kunci = $request->cari;
        $hasil = Merk::where('nama_merk', 'LIKE', '%' . $kata_kunci . '%')->get();
        return view('merek.hasil')
            ->with('hasil', $hasil, 'success', 'Data ' . $kata_kunci . ' Ditemukan!');
    }
}
