<?php

namespace App\Http\Controllers\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelolaSoalController extends Controller
{
    public function halamankelolasoal(){
        return view ('asesor.kelolasoal.index');
    }
}
