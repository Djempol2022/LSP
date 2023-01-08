<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsesmenController extends Controller
{
    private $path = 'asesi/assesment/';
    public function assesment()
    {
        return view($this->path . 'index', [
            'where' => 'Assesment'
        ]);
    }
    public function soal()
    {
        return view($this->path . 'soal', [
            'where' => 'Assesment'
        ]);
    }
}
