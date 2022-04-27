<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BahanBaku;
use App\Models\Penambahan;
use App\LaporanBahanBaku;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Input;

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
        $inputBahanBaku = $request->nama_bahanBaku;
        $Bbaku = DB::table('bahanBaku')->where('nama_bahanBaku',$request->nama_bahanBaku)->exists();
        if($Bbaku){
            return redirect('/tambahBahanBaku')->with('fail','Bahan baku sudah ada!!');
        }else{
            BahanBaku::create([
                'nama_bahanBaku' => $request->nama_bahanBaku,
                'jumlah_bahanBaku' => 0,
                'harga_satuan_bahan' => $request->harga_satuan_bahan,
                'total_harga_bahan' => 0
            ]);
            $mytime = Carbon::now();
            LaporanBahanBaku::insert([
            'created_at' => $mytime,
            ]);
            return redirect('/tambahBahanBaku')->with('success','Bahan Baku Berhasil Dimasukkan !');
        }

    }
    public function penambahanBahanBaku(Request $request, $nama_bahanBaku){

        $bahanBaku = new BahanBaku;
        $harga_satuan_bahan = $bahanBaku->where('nama_bahanBaku',$nama_bahanBaku)->select('harga_satuan_bahan')->first();
        $inputTambah = $request->tambah;
        $tambah = $bahanBaku->where('nama_bahanBaku',$nama_bahanBaku)->increment('jumlah_bahanBaku',$request->tambah);
        $jumlah_bahanBaku = DB::table('bahanBaku')->where('nama_bahanBaku',$nama_bahanBaku)->select('jumlah_bahanBaku')->pluck('jumlah_bahanBaku')->first();
        $hargaSatuan = DB::table('bahanBaku')->where('nama_bahanBaku',$nama_bahanBaku)->select('harga_satuan_bahan')->pluck('harga_satuan_bahan')->first();
        $total = $jumlah_bahanBaku * $hargaSatuan;
        DB::table('bahanBaku')->where('nama_bahanBaku',$nama_bahanBaku)->update([
            'total_harga_bahan' => $total
        ]);
        DB::table('laporan_bahanBaku')->where('nama_bahanBaku',$nama_bahanBaku)->insert([
            'updated_at' => now(),
            'nama_bahanBaku' => $nama_bahanBaku,
            'jumlah_bahanBaku' => $jumlah_bahanBaku,
            'jumlah_penambahanBahan' => $request->tambah
        ]);
        // $total_jumlah_bahan = DB::table('bahanBaku')->where('nama_bahanBaku',$nama_bahanBaku)->sum(DB::raw('jumlah_bahanBaku + jumlah_penambahanBahan'));
       
        
        return redirect('/admin/dashboard/kelolaBahanBaku')->with('success','Bahan Baku Berhasil Ditambah');
    }
    public function penguranganBahanBaku(Request $request, $nama_bahanBaku){
        $bahanBaku = new BahanBaku;
        $harga_satuan_bahan = $bahanBaku->where('nama_bahanBaku',$nama_bahanBaku)->select('harga_satuan_bahan')->first();
        $inputKurang = $request->kurang;
        $kurang = $bahanBaku->where('nama_bahanBaku',$nama_bahanBaku)->decrement('jumlah_bahanBaku',$request->kurang);
        $jumlah_bahanBaku = DB::table('bahanBaku')->where('nama_bahanBaku',$nama_bahanBaku)->select('jumlah_bahanBaku')->pluck('jumlah_bahanBaku')->first();
        $hargaSatuan = DB::table('bahanBaku')->where('nama_bahanBaku',$nama_bahanBaku)->select('harga_satuan_bahan')->pluck('harga_satuan_bahan')->first();
        LaporanBahanBaku::where('nama_bahanBaku',$nama_bahanBaku)->update([
            'updated_at' => now()
        ]);
        return redirect('/admin/dashboard/kelolaBahanBaku')->with('success','Bahan Baku Berhasil Dikurang');
    }
    public function findSearch(Request $request){
        $search = $request->search;
        $bahanBaku = DB::table('bahanBaku')->where('nama_bahanBaku','LIKE','%'.$search.'%')->orderBy('nama_bahanBaku','asc')->get();
        return view('admin/dashboard/kelolaBahanBaku/searchIndex')->with('bahanBaku',$bahanBaku);
    }
}
