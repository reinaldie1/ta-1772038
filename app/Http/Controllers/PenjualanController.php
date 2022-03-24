<?php

namespace App\Http\Controllers;

use App\Penjualan;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use DB;

class PenjualanController extends Controller
{

    public function index(){
        $penjualan = DB::table('penjualan')->orderBy('id_penjualan','asc')->get();
        return view('admin/dashboard/kelolaPenjualan/index ')->with('penjualan',$penjualan);
    }
}
