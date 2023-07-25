<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Models\GambarJenis;

class JenisController extends Controller
{
    public function index(){
        $jenis = Jenis::paginate(10);
        return view('jenis.index', compact('jenis'));
    }

    public function index_users(){
        $jenis_users = Jenis::paginate(10);
        return view('jenis.jenisUsers', compact('jenis_users'));
    }
    public function create(){
        return view('jenis.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'file_contoh_jenis.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //Penyimpanan data Jenis non Gambar
        $namaJenis = $request->nama_jenis;
        $jumlahKataJenis = str_word_count($namaJenis);

        if($jumlahKataJenis === 1){
            $singkatan = substr($namaJenis, 0, 2);
        }else{
            $kata = explode(' ', $namaJenis);
            
            $ambil_karakter_pertama = array_map(function ($kata_pertama){
                return substr($kata_pertama, 0, 1);
            }, $kata);

            $singkatan = implode("", $ambil_karakter_pertama);
        }

        $randomNumber = rand(1,99);
        $rangkaianKata = $singkatan . $randomNumber;

        $jenis = Jenis::create([
            'kode_jenis' => $rangkaianKata,
            'nama_jenis' => $namaJenis,
            'keterangan' => $request->keterangan,
        ]);

        //Penyimpanan Gambar dan ID Jenis
        if($request->hasFile('file_contoh_jenis')){
            foreach($request->file('file_contoh_jenis') as $file){
                $jenisGambar = new GambarJenis();
                $jenisGambar->jenis_id = $jenis->id;
                $jenisGambar->namaFile = $file->getClientOriginalName();
                $file->move('foto/jenis', $file->getClientOriginalName()); // Simpan file gambar di penyimpanan
                $jenisGambar->save();
            }
        }

        return redirect()->route('jenis.index')
                ->with('success', 'Data Jenis ' . $namaJenis .' berhasil ditambahkan!');
        }

    public function show($id){
        $jenis = Jenis::find($id);
        $jenisGambar = $jenis->GambarJenis;
        return view('jenis.show', compact('jenis', 'jenisGambar'));
    }

    public function showUsers($id){
        $jenis_users = Jenis::find($id);
        $jenisGambar = $jenis_users->GambarJenis;
        return view('jenis.showUsers', compact('jenis_users', 'jenisGambar'));
    }
}
