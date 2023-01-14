<?php

namespace App\Http\Controllers\Asesi;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

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

    public function downloadWord()
    {
        $pathToSave = 'word-template/result.docx';

        // $date = date('d F Y');
        $date = Carbon::now('Asia/Jakarta',)->translatedFormat('d F Y');
        $templateProcessor = new TemplateProcessor('002_daftar_tuk_terverifikasi.docx');
        // Isi Tabel
        $values = [
            [
                'no' => 1,
                'namaTUK' => 'James',
                'namaSKEMA' => '+1 428 889 773',
                'penanggungJawab' => 'Taylor',
            ],
            [
                'no' => 2,
                'namaTUK' => 'Robert',
                'namaSKEMA' => '+1 428 889 774',
                'penanggungJawab' => 'Bell',
            ],
            [
                'no' => 3,
                'namaTUK' => 'Michael',
                'namaSKEMA' => '+1 428 889 775',
                'penanggungJawab' => 'Ray',
            ],
        ];
        // Membuat Tabel
        $templateProcessor->cloneRowAndSetValues('no', $values);
        // Set Variabel pada template
        $templateProcessor->setValue('kota', 'Pontianak');
        $templateProcessor->setValue('date', $date);
        // Download file
        header("Content-Disposition: attachment; filename=002_daftar_tuk_terverifikasi.docx");
        $templateProcessor->saveAs('php://output');
    }
}
