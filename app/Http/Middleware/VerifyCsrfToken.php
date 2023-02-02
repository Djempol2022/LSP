<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/admin/data-jurusan',
        '/admin/data-muk',
        '/admin/data-jadwal-uji-kompetensi',
        '/admin/data-pengguna',
        '/admin/data-institusi',
        '/admin/data-kualifikasi-pendidikan',
        '/admin/data-asesi/*',
        '/admin/data-asesor/*',
        '/admin/data-peninjau/*',
        '/admin/data-permohonan-sertifikasi-kompetensi/',
        '/admin/data-unit-kompetensi/*',
        '/admin/data-muk-asesor-peninjau/*',
        '/admin/data-asesi-uji-kompetensi/*',
        '/admin/table-surat-sk-penetapan',
        '/admin/table-surat-daftar-tuk',
        '/admin/data-asesi-asessment-mandiri',
        
        '/asesor/data-unit-kompetensi-jurusan-asesor',
        '/asesor/data-elemen-unit-kompetensi-jurusan-asesor/*',
        '/asesor/data-isi-elemen-unit-kompetensi-jurusan-asesor',
        '/asesor/data-kelola-soal',
        '/asesor/data-peserta-pelaksanaan-uji-kompetensi',
        '/asesor/data-asesmen-mandiri',
        
        '/asesi/asesi-materi-uji-kompetensi',

    ];
}
