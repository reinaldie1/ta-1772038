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
        //get data konsumen
        $getKostumer = DB::table('user')
        ->join('kostumer', 'user.id_user', '=', 'kostumer.id_user')
        ->where('kostumer.id_user',$getUser)
        ->select('kostumer.nama_kostumer','kostumer.id_user')
        ->first();
        
        
        $getTasRajut = DB::table('tasRajut')->where('id_tas',$getTas)->first();
        $getIdTasCart = DB::table('temp_cart')->where('id_user',$getUser)->select('id_tas')->first();
        $getIdTasRajut = DB::table('tasRajut')->where('id_tas',$getTas)->select('id_tas')->first();
        //insert temp cart
        if($getIdTasCart==$getIdTasRajut){
            return redirect('/store')->with('fail','Tas Rajut sudah ada di keranjang!!');
        }elseif($getIdTasCart!=$getIdTasRajut){
            $insertCart = DB::table('temp_cart')->insert([
                'nama_kostumer' => $getKostumer->nama_kostumer,
                'id_user' => $getKostumer->id_user,
                'nama_tas' => $getTasRajut->nama_tas,
                'harga_tas' => $getTasRajut->harga_tas,
                'gambar_tas' => $getTasRajut->gambar_tas,
                'id_tas' => $getTasRajut->id_tas
            ]);
            return redirect('/store')->with('success','Berhasil dimasukkan ke cart!');
        }
        
    }
    public function getUser(){
        $id_user = Auth::id();
        return view('kostumer/kostumerStore/store')->with('kostumer',$kostumer);
    }
}
