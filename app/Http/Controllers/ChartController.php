<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Session;

class ChartController extends Controller
{
    public function index(Request $request){
        $getUser = (int)$request->id_user;
        $getCart = DB::table('temp_cart')->where('id_user',$getUser)->get();
         return view('kostumer/kostumerChart/chart',['getCart'=> $getCart]);
    }
    public function destroy(Request $request){
        $getidCart = (int)$request->id_cart;
        $deleteCartItem = DB::table('temp_cart')->where('id_cart',$getidCart)->delete();
        // return redirect('/cart/{id_user}');
        return back();
    }
}
