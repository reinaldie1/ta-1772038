<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\TasRajut;

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
                $tasRajut = DB::table('tasRajut')->orderBy('id_tas','asc')->get();
                return view('kostumer/kostumerStore/store')->with('tasRajut',$tasRajut);
            }
        }
        else{
            return redirect('/login')->with('message','ID atau Password Salah!!');
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }

    public function formSignUp(){
        return view('auth/signUp');
    }

    public function signUp(Request $request){
        $inputId = $request->id_user;
        $inputPass = md5($request->password);
        $inputEmail = $request->email;
        $inputNama = $request->nama;
        $inputNotlp = $request->no_tlp;

        $checkIdUser = DB::table('user')->where('id_user',$inputId)->exists();
        if($checkIdUser){
            return redirect('/signup')->with('fail','ID SUDAH TERDAFTAR!! COBA USERNAME LAIN');
        }elseif($inputId <2000){
            return redirect('/signup')->with('fail','USERNAME HARUS LEBIH BESAR DARI 2000!!');
        }else{
            DB::table('user')->insert([
                'id_user' => $inputId,
                'username' => $inputNama,
                'password' => $inputPass,
                'id_role' => 2
            ]);
            $idRole = User::where(['id_user'=>$inputId,'password'=>md5($inputId)])->value('id_role');
            session(['login_success' => true]);
            session(['id_role' => $idRole]);
            session(['id_user' => $inputId]);
            session(['username' => $inputNama]);

            DB::table('kostumer')->insert([
                'nama_kostumer'=>$inputNama,
                'id_user'=> $inputId,
                'no_tlp'=> $inputNotlp,
                'email'=> $inputEmail
            ]);
            return view('auth/signUpConfirm')->with('success','Berhasil Membuat Akun !');
        }
    }
    public function signUpConfirm(Request $request,$id_user){
        $inputTglLahir = $request->tgl_lahir;
        $inputProvinsi = $request->provinsi;
        $inputKota = $request->kota;
        $inputAlamat = $request->alamat_lengkap;
        DB::table('kostumer')->where('id_user',$id_user)->update([
            'tgl_lahir' => $inputTglLahir,
            'provinsi' => $inputProvinsi,
            'kota' => $inputKota,
            'alamat_lengkap'=> $inputAlamat
        ]);
        return view('auth/signUpConfirm')->with('success','Data Tersimpan <3!');
    }
}
