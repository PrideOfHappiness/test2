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
        $existingMerek = Merk::where('nama_merk', $merek1)->count();
        $kodeMerek = ''; 
        $jenis_merek = '';
        $angkaAcak = rand(1,999);
        $randomString = Str::random(2);

        //percabangan dan pembentukan kode sesuai format plat nomor Indonesia (AA 9999 AAA)
        if ($request->input('jenis_merek') == 'P') {
            if ($existingMerek) {
                $randomIndex = rand(0, 10);
                $karakterAcak = ['B', 'BA', 'BB', 'BD', 'BE', 'BG', 'BH', 'D', 'DA', 'DB'][$randomIndex];
                $lastNumber = $existingMerek + 1;
                $kodeMerek = $karakterAcak . ' ' . '1' . $angkaAcak . ' ' . strtoupper(substr($merek1, 0, 3));
                $jenis_merek = 'Passenger Vehicles';
            } else {
                $randomIndex = rand(0, 10);
                $karakterAcak = ['A', 'AB', 'AD', 'AE', 'AG', 'AA', 'DC', 'DD', 'DE', 'DG', 'K'][$randomIndex];
                $lastNumber = 1;
                $kodeMerek = $karakterAcak . ' ' . $lastNumber . $angkaAcak . ' ' . strtoupper(substr($merek1, 0, 2));
                $jenis_merek = 'Passenger Vehicles';
            }
        } elseif ($request->input('jenis_merek') == 'C') {
            $jenis_merek = '';
            if ($existingMerek) {
                $randomIndex = rand(0, 10);
                $karakterAcak = ['KH', 'KT', 'KU', 'P', 'PA', 'PB', 'E', 'F', 'G', 'H', 'BK'][$randomIndex];
                $lastNumber = $existingMerek + 1;
                $kodeMerek = $karakterAcak . ' ' . '8' . $angkaAcak . ' ' . strtoupper(substr($merek1, 0, 3));
                $jenis_merek = 'Commercial Vehicles';
            } else {
                $randomIndex = rand(0, 10);
                $karakterAcak = ['BM', 'BN', 'DH', 'DK', 'DL', 'DM', 'EA', 'EB', 'BP', 'L'][$randomIndex];
                $lastNumber = 1;
                $kodeMerek = $karakterAcak . ' ' . '9' . $angkaAcak . ' ' . strtoupper(substr($merek1, 0, 2));
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
