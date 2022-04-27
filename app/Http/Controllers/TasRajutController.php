<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TasRajut;
use App\Penjualan;
use App\LaporanTas;
use DB;

class TasRajutController extends Controller
{
    public function index(){
        $tasRajut = DB::table('tasRajut')->orderBy('id_tas','asc')->get();
        return view('admin/dashboard/kelolaTasRajut/index ')->with('tasRajut',$tasRajut);
    }
    public function formTambahTasRajut(){
        return view('admin/dashboard/kelolaTasRajut/addTasRajut');
    }
    public function tambahTasRajut(Request $request){

        $checkTas = DB::table('tasRajut')->where('nama_tas',$request->nama_tas)->exists();
        $checkGambar = DB::table('tasRajut')->where('gambar_tas',$request->gambar_tas)->exists();
        if($checkTas){
            return back()->with('fail','Tas rajut sudah ada !!');
        }elseif($checkGambar){
            return back()->with('fail','Gambar tas sudah ada !!');
        }else{
            $tambahTas = new TasRajut();
            $tambahTas->nama_tas = $request->nama_tas;
            $tambahTas->harga_tas = $request->harga_tas;
            $tambahTas->status_tas = 'Belum Terjual';
            $image = $request->file('gambar_tas');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('assets/tasRajut');
            $image->move($destinationPath, $name);
            $tambahTas->gambar_tas = $name;
            $tambahTas->save();
            
            $laporan_tas = LaporanTas::insert([
                        'nama_tas' => $tambahTas->nama_tas,
                        'harga_tas' => $tambahTas->harga_tas,
                        'gambar_tas' => $tambahTas->gambar_tas,
                        'status_tas' => $tambahTas->status_tas,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
            
            return back()->with('success','Berhasil Menambahkan Tas Rajut !!');
        }
       
    }
    // public function penjualanTas(Request $request){
    //     $id_tas = (int)$request->id_tas;
    //     $data=TasRajut::getTas($id_tas)->first();
    //     Penjualan::create([
    //         'nama_tas' => $data->nama_tas,
    //         'harga_tas' => $data->harga_tas,
    //         'gambar_tas' => $data->gambar_tas,
    //         'status_tas' => 'Belum Terjual'
    //     ]);
        
    //     return redirect('/admin/dashboard/kelolaTasRajut');
    // }  
}
