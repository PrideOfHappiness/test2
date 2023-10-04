<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlatNomor;
use App\Models\KodePlatNomor;
use App\Models\PlatNomorFoto;
use App\Models\FotoMobil;
use App\Models\FotoKomparasiMobil;

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
        //Percabangan dan pembentukan kode sesuai format angka plat nomor Jepang(99-99/.9-99)
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

    public function show($id){
        $platNomor = PlatNomor::find($id);
        $fotoPlat = $platNomor->platNomorFoto;
        return view('platNomor.show', compact('platNomor', 'fotoPlat'));
    }

    public function showUsers($id){
        $platNomor = PlatNomor::find($id);
        $fotoPlat = $platNomor->platNomorFoto;
        return view('platNomor.showUsers', compact('platNomor', 'fotoPlat'));
    }

    public function edit($id){
        $platNomor = PlatNomor::find($id);
        if($platNomor->for == 'All Vehicles'){
            $angka = 1;
            $huruf = "Untuk semua jenis kendaraan";
        }elseif($platNomor->for == 'Non-Electrified Vehicle Plates'){
            $angka = 2;
            $huruf = "Hanya untuk kendaraan non elektrifikasi (non BEV, FCEV, dll)";
        }else{
            $angka = 3;
            $huruf = "Hanya untuk kendaraan terelektrifikasi (non Hybrid)";
        }

        $fotoPlat = $platNomor->platNomorFoto;
        return view('platNomor.edit', compact('angka', 'huruf', 'fotoPlat', 'platNomor'));
    }

    public function update(Request $request, $id){
        $platNomor = PlatNomor::find($id);
        
        $this->validate($request, [
            'fotoPlatNomor' => 'mimes:jpeg,png,jpg,gif,svg'
        ]);

        $kode = $request->kodenegara;
        $negara = $request->namanegara;
        $jenis = $request->status;
        $keterangan = $request->keterangan;

        if($jenis == 1){
            $jenis = 'All Vehicles';
        }elseif($jenis == 2){
            $jenis = 'Non-Electrified Vehicle Plates';
        }elseif($jenis == 3){
            $jenis = 'Electrified Vehicles Plates';
        }else{
            return redirect()->route('platNomor.edit')
                ->with('error', 'Data belum lengkap! Silahkan cek terlebih dahulu.');
        }

        if($request->hasFile('fotoPlatNomor')){
            $file = $request->file('fotoPlatNomor');
            $fotoPlatNomor = new PlatNomorFoto();
            $fotoPlatNomor->plat_id = $platNomor->id;
            $uniqueFileName = $file->getClientOriginalName();
            $fotoPlatNomor->namaFile = $uniqueFileName;
            $fotoPlatNomor->save();

            $platNomor->update([
                'kode_negara' => $kode,
                'nama_negara' => $negara,
                'for' => $jenis,
                'keterangan' => $keterangan,
            ]);
        }else{
            $platNomor->update([
                'kode_negara' => $kode,
                'nama_negara' => $negara,
                'for' => $jenis,
                'keterangan' => $keterangan,
            ]);
        }

        return redirect()->route('platNomor.index')
            ->with('success', 'Data Plat Nomor ' . $negara .' berhasil diubah!');
    }

    public function destroy($id){
        $platNomor = PlatNomor::find($id);
        $platNomorId = $platNomor->id;

        $checkData = FotoMobil::where('FotoMobil.plat_nomor', $platNomorId)->get();
        $checkData1 = FotoKomparasiMobil::where('FotoKomparasiMobil.plat_nomor_mobil1', $platNomorId)
            ->orWhere('FotoKomparasiMobil.plat_nomor_mobil1', $platNomorId)->orWhere('FotoKomparasiMobil.plat_nomor_mobil3', $platNomorId)
            ->orWhere('FotoKomparasiMobil.plat_nomor_mobil4', $platNomorId)->get();

        if(sizeof($checkData) > 0 || sizeof($checkData1) > 0){
            return redirect()->route('platNomor.index')
                ->with('error', 'Data ini tidak dapat dihapus, karena digunakan dalam data lainnya.');
        }else{
            $platNomor->delete();
            return redirect()->route('platNomor.index')
                ->with('success', 'Data Plat Nomor berhasil dihapus!');
        }
    }
}
