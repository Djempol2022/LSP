<?php

namespace App\Http\Controllers\Asesi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsesmenController extends Controller
{
    private $path = 'asesi/assesment/';
    public function assesment()
    {
        return view($this->path . 'index', [
            'where' => 'Pengaturan'
        ]);
    }
    public function soal()
    {
        return view($this->path . 'soal', [
            'where' => 'Pengaturan'
        ]);
    }
}
