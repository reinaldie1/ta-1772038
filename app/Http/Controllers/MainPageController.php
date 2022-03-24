<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(){
        return view('index');
    }
    public function kostumerMain(){
        return view('kostumer/kostumer');
    }
}
