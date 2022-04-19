<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TempCart;
use DB;

class StoreController extends Controller
{
    public $modalCart = false;

    public function index(){
        $tasRajut= DB::table('tasRajut')->get();
        return view('kostumer/kostumerStore/store',['tasRajut'=>$tasRajut]);
    }
    public function indexFT(){
        return view('kostumer/kostumerStore');
    }
    public function cart(Request $request){
        $getUser = (int)$request->id_user;
        $getTas = (int)$request->id_tas;
        $getKostumer = DB::table('user')
        ->join('kostumer', 'user.id_user', '=', 'kostumer.id_user')
        ->where('kostumer.id_user',$getUser)
        ->select('kostumer.nama_kostumer','kostumer.id_user')
        ->first();
        
        $getTasRajut = DB::table('tasRajut')->where('id_tas',$getTas)->first();
        $insertCart = DB::table('temp_cart')->insert([
            'nama_kostumer' => $getKostumer->nama_kostumer,
            'id_user' => $getKostumer->id_user,
            'nama_tas' => $getTasRajut->nama_tas,
            'harga_tas' => $getTasRajut->harga_tas,
            'gambar_tas' => $getTasRajut->gambar_tas
        ]);

        return redirect('/store');
    }
    public function getUser(){
        $id_user = Auth::id();
        return view('kostumer/kostumerStore/store')->with('kostumer',$kostumer);
    }
}
