<?php

namespace App\Http\Controllers\Asesor;

use App\Models\User; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function dashboard(){
      $user = User::first();
        return view('asesor.dashboard.dashboard', compact('user'));
    }
    public function halamanprofil(){
   
        return view('asesor.dashboard.profile' );
    }
}
