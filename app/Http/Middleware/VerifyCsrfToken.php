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
        '/admin/data-jadwal-uji-kompetensi/*',
        '/admin/data-pengguna',
        '/admin/data-institusi',
        '/admin/data-kualifikasi-pendidikan',
        '/admin/data-asesi/*',
        '/admin/data-asesor/*',
        '/admin/data-peninjau/*',
        '/admin/data-permohonan-sertifikasi-kompetensi/',
        '/asesi/materi-uji-kompetensi',
        '/admin/table-surat-sk-penetapan',
        '/admin/table-surat-daftar-tuk',
        '/admin/table-surat-hasil-verifikasi-tuk',
        '/admin/table-surat-st-verifikasi-tuk',
        '/admin/table-surat-x03-st-verifikasi-tuk',
        '/admin/table-surat-x04-berita-acara',
        '/admin/table-surat-z-ba-pecah-rp',
    ];
}
