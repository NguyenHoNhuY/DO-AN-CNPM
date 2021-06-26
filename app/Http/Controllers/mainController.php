<?php

namespace App\Http\Controllers;
use App\Models\phong;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function index(){
        $phongs = phong::all();
        return view('layout.index',compact('phongs'));
    }
}
