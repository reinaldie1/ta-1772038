<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Kostumer;
use App\Penjualan;
use DB;
use PDF;

class CheckoutController extends Controller
{
    public $getharga;
    public function index(Request $request){
        $getUser = (int)$request->id_user;
        $getConf = DB::table('temp_cart')->where('id_user',$getUser)->get();
        $this->getharga = DB::table('temp_cart')->where('id_user',$getUser)->select('harga_tas')->sum('harga_tas');
        return view('kostumer/kostumerCheckout/index',['getConf'=> $getConf, 'getharga' =>$this->getharga]);
    }
    public function confirm(Request $request){
        $getUser = (int)$request->id_user;
        $getKostumer = DB::table('user')
        ->join('kostumer', 'user.id_user', '=', 'kostumer.id_user')
        ->where('kostumer.id_user',$getUser)
        ->first();
        
       
        return view('kostumer/kostumerConfirm/index',['getKostumer'=>$getKostumer]);
    }
    public function invoice(Request $request){
        $getUser = (int)$request->id_user;
        $getCart = DB::table('temp_cart')->where('id_user',$getUser)->get();
        $getDataKostumer = DB::table('user')
        ->join('kostumer', 'user.id_user', '=', 'kostumer.id_user')
        ->where('kostumer.id_user',$getUser)
        ->first();
        
        // DB::table('penjualan')->insert([
        //     'nama_tas' => $getCart->nama_tas,
        //     'harga_tas' => $getCart->harga_tas,
        //     'status_tas' => 'Terjual',
        //     'nama_kostumer' => $getDataKostumer->nama_kostumer,
            
        // ]);
        Kostumer::where('id_user',$getUser)->update([
            'no_tlp' => $request->no_tlp,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat_lengkap' => $request->alamat_lengkap
        ]);
        $this->getharga = DB::table('temp_cart')->where('id_user',$getUser)->select('harga_tas')->sum('harga_tas');
        
        $getKostumer = DB::table('user')
        ->join('kostumer', 'user.id_user', '=', 'kostumer.id_user')
        ->where('kostumer.id_user',$getUser)
        ->first();
        return view('kostumer/kostumerConfirm/invoice',['getKostumer'=>$getKostumer , 'getCart'=> $getCart, 'getharga' =>$this->getharga]);
    }
    // public function pdf(){
    //     $pdf = PDF::loadview('kostumer/kostumerConfirm/invoice',compact(''))->setPaper('A4','potrait');
    //     return $pdf->download('invoice.pdf');
    // }
}
