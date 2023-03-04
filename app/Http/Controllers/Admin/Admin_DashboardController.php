<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Admin_DashboardController extends Controller
{
    public function dashboard(){
        $total_asesi = User::with('relasi_role')->whereRelation('relasi_role', 'role', '=',  'asesi')->count();
        $total_peninjau = User::with('relasi_role')->whereRelation('relasi_role', 'role', '=',  'peninjau')->count();
        $total_asesor = User::with('relasi_role')->whereRelation('relasi_role', 'role', '=', 'asesor')->count();
        $total_admin = User::with('relasi_role')->whereRelation('relasi_role', 'role', '=', 'admin')->count();
        return view('admin.dashboard.dashboard', compact('total_asesi', 'total_asesor', 'total_peninjau', 'total_admin'));
    }
    
}
