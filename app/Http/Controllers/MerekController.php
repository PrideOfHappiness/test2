<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Merek;

class MerekController extends Controller
{
    public function index(){
        $merek = Merek::paginate(20);
        return view('merek.index', compact('merek'));
    }

    public function create(){
        return view('merek.create');
    }

    public function store(Request $request){
        
    }
}
