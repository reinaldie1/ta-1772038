<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index(){
        return view('auth/login');
    }
    public function login(Request $request){
        $noUser= $request->input('txtUsername');
        $password= $request->input('txtPassword');
        $idRole = User::where(['id_user'=>$noUser,'password'=>md5($password)])->value('id_role');
        $username = User::where(['id_user'=>$noUser,'password'=>md5($password)])->value('username');
        $checkLogin= User::where(['id_user'=>$noUser,'password'=>md5($password)])->first();
        if(!empty($checkLogin)){
            session(['login_success' => true]);
            session(['id_role' => $idRole]);
            session(['id_user' => $noUser]);
            session(['username' => $username]);
            if($noUser<2000){
                return view('admin/admin');
            }else{
                return view('kostumer/kostumer');
            }
        }
        else{
            return redirect('/')->with('message','ID atau Password Salah!!');
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}
