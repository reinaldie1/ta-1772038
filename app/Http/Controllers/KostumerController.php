<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kostumer;

class KostumerController extends Controller
{
    public function index(){
        $kostumer = Kostumer::all();
        return view('admin/dashboard/kelolaKostumer/index ')->with('kostumer',$kostumer);
    }
}
