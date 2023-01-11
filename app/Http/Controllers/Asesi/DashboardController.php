<?php

namespace App\Http\Controllers\Asesi;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserDetail;

class DashboardController extends Controller
{
    private $path = 'asesi/dashboard/';
    public function dashboard()
    {
        $user_detail = UserDetail::where('user_id', auth()->user()->id)->first();
        return view($this->path . 'index', [
            'where' => 'Dashboard',
            'user' => $user_detail
        ]);
    }
    // public function profile()
    // {
    //     return view($this->path . 'profile', [
    //         'where' => 'Profile',
    //     ]);
    // }
}
