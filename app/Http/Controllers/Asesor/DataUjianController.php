<?php

namespace App\Http\Controllers\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataUjianController extends Controller
{
    public function halamandataujian(){
        return view ('asesor.penilaian.index');
    }
}
