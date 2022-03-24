<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;
use DB;

class ProfileController extends Controller
{
    public function index($id_user){
        // Auth::check();
        // $id_user = Auth::id();
        // $profile = DB::table('user')
        //             ->join('admin','user.id_user','=','admin.id_user')
        //             ->select('admin.*')
        //             ->where(['admin.id_user'=>$id_user])
        //             ->get();
        // return view ('admin/dashboard/kelolaProfile/index',['profile'=>$profile]);
        $profile = Admin::find($id_user);
        return view('admin.dashboard.kelolaProfile.index',['profile'=>$profile]);
    }
    public function profileAdmin(){

    }

}
