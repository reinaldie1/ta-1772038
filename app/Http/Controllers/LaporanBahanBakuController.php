<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LaporanBahanBakuController extends Controller
{
    public function index(){
        $lapBhn= DB::table('laporan_bahanBaku')->orderBy('id_laporan_bahan','asc')->get();
        return view('admin/dashboard/kelolaLaporanBahan/index',['lapBhn'=>$lapBhn]);
    }
}
