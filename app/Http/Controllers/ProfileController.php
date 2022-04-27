<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Penjualan;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    public function index($id_user){

        $profile = Admin::find($id_user);
        return view('admin.dashboard.kelolaProfile.index',['profile'=>$profile]);
    }
    public function indexKostumer(Request $request){
        $getUser = (int)$request->id_user;
        $getKostumer = DB::table('user')
        ->join('kostumer', 'user.id_user', '=', 'kostumer.id_user')
        ->where('kostumer.id_user',$getUser)
        ->first();

        return view('kostumer/kostumerProfile/profile',['getKostumer' => $getKostumer]);
    }
    public function invoiceKostumer(Request $request){
        $getUser = (int)$request->id_user;
        $getKostumer = DB::table('user')
        ->join('kostumer', 'user.id_user', '=', 'kostumer.id_user')
        ->where('kostumer.id_user',$getUser)
        ->first();

        $getInvoices = DB::table('penjualan')->where('id_user',$getUser)->get();

        return view('kostumer/kostumerProfile/massiveInvoice',['getInvoices'=>$getInvoices]);
    }

    public function allInvoice(Request $request){
        $getUser = (int)$request->id_user;

        $getAllInvoice = DB::table('penjualan')
                ->select('order_id')
                ->where('id_user',$getUser)
                ->groupBy('order_id')
                ->get();
        
        return view('kostumer/kostumerProfile/profileInvoice',['getAllInvoice'=>$getAllInvoice]);
    }
    public function invoice(Request $request){
        
        $getUser = (int)$request->id_user;
        $getKostumer = DB::table('user')
        ->join('kostumer', 'user.id_user', '=', 'kostumer.id_user')
        ->where('kostumer.id_user',$getUser)
        ->first();
        $getOrderID = $request->order_id;
        $getOneInvoice = DB::table('penjualan')
            ->where('id_user',$getUser)
            ->where('order_id',$getOrderID)
            ->get();
        $getharga = DB::table('penjualan')
            ->where('id_user',$getUser)
            ->where('order_id',$getOrderID)
            ->select('harga_tas')
            ->sum('harga_tas');
        $getOneDataInvoice = DB::table('penjualan')
            ->select('order_id','created_at')
            ->where('id_user',$getUser)
            ->where('order_id',$getOrderID)
            ->first();

        return view('kostumer/invoice/index',['getKostumer'=>$getKostumer ,'getOneInvoice'=>$getOneInvoice,'getharga'=>$getharga,'getOneDataInvoice'=>$getOneDataInvoice]);
    }

}
