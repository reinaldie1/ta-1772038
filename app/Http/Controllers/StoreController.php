<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StoreController extends Controller
{
    public function index(){
        $tasRajut= DB::table('tasRajut')->get();
        return view('kostumer/kostumerStore/store',['tasRajut'=>$tasRajut]);
    }
    public function indexFT(){
        return view('kostumer/kostumerStore');
    }
}
