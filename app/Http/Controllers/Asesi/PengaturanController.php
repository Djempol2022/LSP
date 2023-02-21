<?php

namespace App\Http\Controllers\Asesi;

use App\Models\User;
use App\Rules\checkPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    private $path = 'asesi/pengaturan/';
    public function pengaturan()
    {
        return view($this->path . 'index', [
            'where' => 'Pengaturan'
        ]);
    }
    public function cgPassword(Request $request)
    {
        $id = Auth::id();
        $password_baru = Hash::make($request->password_baru);
        $messages = array(
            'required' => 'Password wajib diisi',
            'min' => 'Panjang password minimal 5 huruf',
            'max' => 'Password terlalu panjang',
            'different' => 'Password tidak boleh sama'
        );
        $request->validate([
            'password_lama' => ['required', new checkPassword],
            'password_baru' => ['required', 'min:5', 'max:255', 'different:password_lama'],
        ], $messages);
        User::find($id)->update(['password' => $password_baru]);
        return redirect(route('asesi.Pengaturan'))->with('berhasil', 'Ganti password berhasil');
    }
}
