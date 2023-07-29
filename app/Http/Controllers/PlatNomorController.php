<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlatNomor;
use App\Models\KodePlatNomor;
use App\Models\PlatNomorFoto;

class PlatNomorController extends Controller
{
    public function index(){
        $platNomor = PlatNomor::paginate(20);
        $foto = PlatNomor::with('platNomorFoto')->get();
        return view('platNomor.index', compact('platNomor', 'foto'));
    }

    public function indexUsers(){
        $platNomor = PlatNomor::paginate(20);
        $platNomorFoto = $platNomor->platNomorFoto;
        return view('platNomor.indexUsers', compact('platNomor', 'platNomorFoto'));
    }

    public function create(){
        $kode_negara = KodePlatNomor::selectRaw("id, kode_registrasi_negara, nama_negara, concat(daftar_negara.nama_negara, ' - ', 
        daftar_negara.kode_registrasi_negara) as negara")->orderBy('nama_negara', 'asc')->get();
        return view('platNomor.create', compact('kode_negara'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'fotoPlatNomor' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ]);
        
        $selectedDropDownValue = $request->input('negara');
        $selectedNegaraValue = $request->input('negara_text');
        $jenisPlat = $request->status;
        $angkaAcak = rand(1,9);
        $angkaAcak1 = rand(10, 99);
        $nama = '';
        $kode = '';

        //Cek ketersediaan plat nomor dengan negara yang sama sebelumnya
        $existingNegara = PlatNomor::where('nama_negara', $selectedNegaraValue)->exists();

        //Percabangan untuk jenis plat
        if($jenisPlat == 1){
            $jenis = 'All Vehicles';
        }elseif($jenisPlat == 2){
            $jenis = 'Non-Electrified Vehicle Plates';
        }elseif($jenisPlat == 3){
            $jenis = 'Electrified Vehicles Plates';
        }else{
            return redirect()->route('platNomor.create')
                ->with('error', 'Data belum lengkap! Silahkan cek terlebih dahulu.');
        }
        //Percabangan dan pembentukan kode sesuai format plat nomor Jepang(99-99)
        if($selectedDropDownValue > 99){
            $id = (string)$selectedDropDownValue;
            $lastTwoDigits = substr($id, -2);
            $firstDigit = $id[0];
            if($selectedDropDownValue >= 100 && $selectedDropDownValue <= 109){
                if($existingNegara){
                    $countExistingNegara = PlatNomor::where('nama_negara', $selectedNegaraValue)->count();
                    $kode = 'o' . $lastTwoDigits .'-' . $firstDigit . $countExistingNegara + 1;
                    $nama = $selectedNegaraValue . ' (' . $countExistingNegara + 1 . ')';
                }else{
                    $kode = 'o' . $lastTwoDigits .'-' . $firstDigit . $angkaAcak;
                    $nama = $selectedNegaraValue;
                }
            }else{
                if($existingNegara){
                    $countExistingNegara = PlatNomor::where('nama_negara', $selectedNegaraValue)->count();
                    $kode = $lastTwoDigits .'-' . $firstDigit . $countExistingNegara + 1;
                    $nama = $selectedNegaraValue . ' (' . $countExistingNegara + 1 . ')';
                }else{
                    $kode = $lastTwoDigits .'-' . $angkaAcak . $firstDigit;
                    $nama = $selectedNegaraValue;
                }
            }
        }elseif($selectedDropDownValue <= 99){
            if($selectedDropDownValue >= 1 && $selectedDropDownValue <= 9){
                if($existingNegara){
                    $countExistingNegara = PlatNomor::where('nama_negara', $selectedNegaraValue)->count();
                    $kode = 'o' . (string)$selectedDropDownValue .'-' . $countExistingNegara + 1 . $angkaAcak;
                    $nama = $selectedNegaraValue . ' (' . $countExistingNegara + 1 . ')';
                }else{
                    $kode = 'o' . (string)$selectedDropDownValue .'-' . $angkaAcak1;
                    $nama = $selectedNegaraValue;
                }
            }else{
                if($existingNegara){
                    $countExistingNegara = PlatNomor::where('nama_negara', $selectedNegaraValue)->count();
                    $kode = (string)$selectedDropDownValue .'-' . $countExistingNegara + 1 . $angkaAcak;
                    $nama = $selectedNegaraValue . ' (' . $countExistingNegara + 1 . ')';
                }else{
                    $kode = (string)$selectedDropDownValue .'-' . $angkaAcak1;
                    $nama = $selectedNegaraValue;
                }
            }
        }else{
            return redirect()->route('platNomor.create')
                ->with('error', 'Data belum lengkap! Silahkan cek terlebih dahulu.');
        }

        $platNomor = PlatNomor::create([
            'kode_negara' => $kode,
            'nama_negara' => $nama,
            'for' => $jenis,
            'keterangan' => $request->keterangan,
        ]);

        if($request->file('fotoPlatNomor') !== null){
                $file = $request->file('fotoPlatNomor');
                $fotoPlatNomor = new PlatNomorFoto();
                $fotoPlatNomor->plat_id = $platNomor->id;
                $uniqueFileName = uniqid() . '_' . $file->getClientOriginalName();
                $fotoPlatNomor->namaFile = $uniqueFileName;
                $fotoPlatNomor->save();
                $file->move('foto/plat_nomor', $uniqueFileName);
            } 

        return redirect()->route('platNomor.index')
            ->with('success', 'Data Plat Nomor ' . $nama .' berhasil ditambahkan!');
    }
}
