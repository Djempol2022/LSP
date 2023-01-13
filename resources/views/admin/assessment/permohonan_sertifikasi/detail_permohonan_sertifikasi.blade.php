@extends('layout.main-layout', ['title' => 'Detail Permohonan Sertifikasi Kompetensi'])
@section('main-section')
    <div class="container mt-5 jalur-file">
        {{-- JALUR FOLDER --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                        href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Profil</li>
            </ol>
        </nav>
        {{-- EDIT PROFIL --}}
        <div class="mt-5">
            <h5 class="text-black my-4">Permohonan Sertifikasi Kompetensi</h5>
            <img src="/images/logo/favicon_lsp.png" width="180px" class="rounded-circle" alt="">

            {{-- RINCIAN DATA PEMOHON SERTIFIKASI --}}
            <div class="mb-5 pb-5">
                <div class="col profil-section-title">
                    Bagian 1 : Rincian Data Pemohon Sertifikasi
                </div>
                {{-- DATA PRIBADI --}}
                <div class="col profil-section">
                    <h5>A. Data Pribadi</h5>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Lengkap</p>
                                <span></span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Institusi / Perusahaan</p>
                                <span></span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Jurusan</p>
                                <span></span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Nomor KTP/NIK/Paspor</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tempat Lahir</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanggal Lahir</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Jenis Kelamin</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col pb-4">
                                <p class="fw-bold">Kebangsaan</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Alamat Rumah</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Kode Pos</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Nomor Telepon</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Email</p>
                                <span>muhammadagung@gmail.com</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Kualifikasi Pendidikan</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- DATA PEKERJAAN SEKARANG --}}
                <div class="col profil-section">
                    <h5>B. Data Pekerjaan Sekarang</h5>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Institusi / Perusahaan</p>
                                <span>SMK NEGERI 1 SINTANG</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Jabatan</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Alamat Kantor</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col pb-4">
                                <p class="fw-bold">Kode Pos</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Nomor Telepon Institusi / Perusahaan</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Email Institusi / Peerusahaan</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DATA SERTIFIKASI --}}
            <div class="mb-5 pb-5">
                <div class="col profil-section-title">
                    Bagian 2 : Data Sertifikasi
                </div>
                <p class="py-3" style="font-size: 18px">Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan
                    berikut.
                    Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan
                    latar
                    belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.
                </p>
                <div class="col profil-section">
                    <div class="col pb-45">
                        <p class="fw-bold">Judul Skema Sertifikasi</p>
                        <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Nomor Skema Sertifikasi</p>
                        <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Tujuan Asesmen</p>
                        <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Daftar Unit Kompetensi Sesuai Kemasan</p>
                        <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    </div>
                </div>
            </div>

            {{-- BUKTI KELENGKAPAN PEMOHON --}}
            <div class="mb-5 pb-5">
                <div class="col profil-section-title">
                    Bagian 3 : Bukti Kelengkapan Pemohon
                </div>
                <p class="py-3" style="font-size: 18px">Bukti Persyaratan Dasar Pemohon.</p>
                <div class="col profil-section">
                    <div class="col pb-45">
                        <p class="fw-bold">Nilai Mata Pelajaran Kompetensi Keahlian Multimedia</p>
                        <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Sertifikat Prakerin atau Surat Keterangan Telah Melaksanakan Praktek Kerja
                            Industri</p>
                        <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Nilai Raport</p>
                        <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    </div>
                </div>
            </div>

            {{-- HASIL PERSYARATAN --}}
            <div class="mb-5 pb-5">
                <div class="col profil-section-title">
                    Hasil Persyaratan
                </div>
                <div class="col profil-section">
                    <div class="row my-4">
                        {{-- PEMOHON / KANDIDAT --}}
                        <div class="col-md-6">
                            <h5 class="pb-4">Pemohon / Kandidat :</h5>
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Lengkap</p>
                                <span>Muhammad Agung</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanda Tangan</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanggal</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                        </div>
                        {{-- ADMIN LSP --}}
                        <div class="col-md-6">
                            <h5 class="pb-4">Admin LSP :</h5>
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Lengkap</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">No. Reg</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanda Tangan</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanggal</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Catatan</p>
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5">
                        <span>Berdasarkan ketentuan persyaratan dasar, maka pemohon:</span><br>
                        <p><span class="fw-bold">Diterima/Tidak Diterima</span> sebagai peserta sertifikasi</p>
                        <button type="button" class="btn btn-primary tombol-primary-medium mt-5" data-bs-toggle="modal"
                            data-bs-target="#editProfil">Edit Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
