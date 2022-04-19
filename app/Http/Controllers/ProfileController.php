<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;
use DB;

class ProfileController extends Controller
{
    public function index($id_user){

        $profile = Admin::find($id_user);
        return view('admin.dashboard.kelolaProfile.index',['profile'=>$profile]);
    }
    public function profileAdmin(){

    }

}
