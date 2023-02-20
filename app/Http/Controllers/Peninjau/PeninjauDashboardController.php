<?php

namespace App\Http\Controllers\Peninjau;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeninjauDashboardController extends Controller
{
    public function dashboard(){
        return view('peninjau.dashboard.dashboard');
    }
}
