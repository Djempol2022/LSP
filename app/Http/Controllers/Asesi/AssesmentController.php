<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssesmentController extends Controller
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
