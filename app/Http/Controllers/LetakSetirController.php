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

        if($request->hasFile('fotoDashboard')){
            $foto = $request->file('fotoDashboard');
            $namaFile = $foto->getClientOriginalName();
            $foto->move('foto/letakSetir/', $namaFile);
        }

        $location = DrivingLocation::create([
            'location' => $letakSetir,
            'namaFile' => $namaFile,
        ]);

        return redirect()->route('setir.index')
            ->with('success', 'Data letak setir ' . $letakSetir .' berhasil ditambahkan!');
    }
}
