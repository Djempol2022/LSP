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
        '/admin/data-kualifikasi-pendidikan'
    ];
}
