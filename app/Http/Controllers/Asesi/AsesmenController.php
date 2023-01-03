<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsesmenController extends Controller
{
    private $path = 'asesi/assesment/';
    public function assesment(Request $request)
    {
        $request;
        return view($this->path . 'index', [
            'where' => 'Assesment'
        ]);
    }
}
