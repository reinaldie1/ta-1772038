<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LaporanTasController;
use DB;

class LaporanTasController extends Controller
{
    public function index(){
        $lapTas= DB::table('laporan_tas')->orderBy('id_laporan_tas','asc')->get();
        return view('admin/dashboard/kelolaLaporanTas/index',['lapTas'=>$lapTas]);
    }
}
