<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $path = 'asesi/dashboard/';
    public function dashboard()
    {
        return view($this->path . 'index', [
            'where' => 'Dashboard',
            'user' => User::first()
        ]);
    }
    public function profile()
    {
        return view($this->path . 'profile', [
            'where' => 'Profile',
            'user' => User::with('role', 'sekolah', 'jurusan')->first()
        ]);
    }
}
