<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BahanBaku;
use App\Models\Penambahan;
use App\LaporanBahanBaku;
use Carbon\Carbon;
use DB;

class BahanBakuController extends Controller
{
    public function index(){
        $bahanBaku = DB::table('bahanBaku')->orderBy('nama_bahanBaku','asc')->get();
        return view('admin/dashboard/kelolaBahanBaku/index ')->with('bahanBaku',$bahanBaku);
    }
    public function formBahanBaku(){
        return view('admin/dashboard/kelolaBahanBaku/addBahanBaku');
    }
    public function tambahBahanBaku(Request $request){
        
        BahanBaku::create([
            'nama_bahanBaku' => $request->nama_bahanBaku,
            'jumlah_bahanBaku' => $request->jumlah_bahanBaku
        ]);
        $mytime = Carbon::now();
        LaporanBahanBaku::insert([
            'nama_bahanBaku' => $request->nama_bahanBaku,
            'jumlah_bahanBaku' => $request->jumlah_bahanBaku,
            'created_at' => $mytime,
            'updated_at' => now()
        ]);
        return view('admin/dashboard/kelolaBahanBaku/addBahanBaku');
    }
    public function penambahanBahanBaku(Request $request, $nama_bahanBaku){

        $bahanBaku = new BahanBaku;
        $bahanBaku->where('nama_bahanBaku',$nama_bahanBaku)->increment('jumlah_bahanBaku',$request->tambah);
        LaporanBahanBaku::where('nama_bahanBaku',$nama_bahanBaku)->update([
            'updated_at' => now()
        ]);
        return redirect('/admin/dashboard/kelolaBahanBaku')->with('success','Bahan Baku Berhasil Ditambah');
    }
    public function penguranganBahanBaku(Request $request, $nama_bahanBaku){
        $bahanBaku = new BahanBaku;
        $bahanBaku->where('nama_bahanBaku',$nama_bahanBaku)->decrement('jumlah_bahanBaku',$request->kurang);
        LaporanBahanBaku::where('nama_bahanBaku',$nama_bahanBaku)->update([
            'updated_at' => now()
        ]);
        return redirect('/admin/dashboard/kelolaBahanBaku')->with('success','Bahan Baku Berhasil Dikurang');
    }
}
