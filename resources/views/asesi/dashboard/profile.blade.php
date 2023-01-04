@extends('layout.main-layout')
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
            <div class="alert fs-6" role="alert" style="background-color: #F8D7DA">
                Lengkapi Profil untuk Melengkapi Formulir Permohonan Sertifikasi Kompetensi, sebagai Syarat untuk
                Melakukan
                Ujian Sertifikasi!
            </div>
            <h5 class="text-black my-4">Permohonan Sertifikasi Kompetensi</h5>
            <img src="/images/logo/favicon_lsp.png" width="180px" class="rounded-circle" alt="">

            {{-- RINCIAN DATA PEMOHON SERTIFIKASI --}}
            <div class="mb-5 pb-5">
                <div class="col profil-section-title">
                    Bagian 1 : Rincian Data Pemohon Sertifikasi
                </div>
                <p class="py-3" style="font-size: 18px">Pada bagian ini, cantumkan data pribadi, data pendidikan formal
                    serta
                    data pekerjaan
                    anda saat
                    ini.
                </p>

                {{-- DATA PRIBADI --}}
                <div class="col profil-section">
                    <h5>A. Data Pribadi</h5>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Lengkap</p>
                                <span>Muhammad Agung</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Institusi / Perusahaan</p>
                                <span>SMK NEGERI 1 SINTANG</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Jurusan</p>
                                <span>MULTIMEDIA</span>
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

    {{-- MODAL PROFIL --}}
    <div class="modal fade" id="editProfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editProfilLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editProfilLabel">Edit Profil-APL 01</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mx-3">
                        <form action="" method="POST">
                            @csrf
                            <div class="col my-3">
                                {{-- JUDUL --}}
                                <div class="profil-section-title" style="font-size: 20px">
                                    Bagian 1 : Rincian Data Pemohon Sertifikasi
                                </div>
                                {{-- FORM --}}
                                <div class="col profil-section">
                                    {{-- DATA PRIBADI --}}
                                    <div class="mt-5">
                                        <h5>A. Data Pribadi</h5>
                                        <div class="row mt-4">
                                            <div class="col-lg-6">
                                                <div class="col edit-profil-left">
                                                    <label for="namaLengkap" class="form-label fw-semibold">Nama
                                                        Lengkap</label>
                                                    <input type="text" id="namaLengkap"
                                                        class="form-control input-text"
                                                        placeholder="Masukkan Nama Lengkap">
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="instansi" class="form-label fw-semibold">Nama Sekolah /
                                                        Instansi /
                                                        Perusahaan</label>
                                                    <select name="" class="form-select input-text" id="instansi">
                                                        <option value="" selected disabled>Pilih Nama Sekolah /
                                                            Instansi
                                                            /
                                                            Perusahaan</option>
                                                        <option value="">SMK NEGERI 1 SINTANG</option>
                                                        <option value="">SMK NEGERI 4 PONTIANAK</option>
                                                    </select>
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="jurusan" class="form-label fw-semibold">Jurusan</label>
                                                    <select name="" class="form-select input-text" id="jurusan">
                                                        <option value="" selected disabled>Pilih Jurusan</option>
                                                        <option value="">TEKNIK KOMPUTER DAN JARINGAN</option>
                                                        <option value="">MULTIMEDIA</option>
                                                    </select>
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="nomorKtp" class="form-label fw-semibold">Nomor
                                                        KTP/NIK/Paspor</label>
                                                    <input type="text" id="nomorKtp" class="form-control input-text"
                                                        placeholder="Masukkan Nomor KTP/NIK/Paspor">
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="tempatLahir" class="form-label fw-semibold">Tempat
                                                        Lahir</label>
                                                    <input type="text" id="tempatLahir"
                                                        class="form-control input-text"
                                                        placeholder="Masukkan Tempat Lahir">
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="tanggalLahir" class="form-label fw-semibold">Tanggal
                                                        Lahir</label>
                                                    <input type="date" id="tanggalLahir"
                                                        class="form-control input-text"
                                                        placeholder="Masukkan Nama Lengkap">
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="jenisKelamin" class="form-label fw-semibold">Jenis
                                                        Kelamin</label>
                                                    <select name="" class="form-select input-text"
                                                        id="jenisKelamin">
                                                        <option value="" selected disabled>Pilih Jenis Kelamin
                                                        </option>
                                                        <option value="">LAKI-LAKI</option>
                                                        <option value="">PEREMPUAN</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="col edit-profil-right">
                                                    <label for="kebangsaan"
                                                        class="form-label fw-semibold">Kebangsaan</label>
                                                    <select name="" class="form-select input-text"
                                                        id="kebangsaan">
                                                        <option value="" selected disabled>Pilih Kebangsaan</option>
                                                        <option value="">Indonesia</option>
                                                        <option value="">Malaysia</option>
                                                    </select>
                                                </div>
                                                <div class="col edit-profil-right">
                                                    <label for="alamatRumah" class="form-label fw-semibold">Alamat
                                                        Rumah</label>
                                                    <input type="text" id="alamatRumah"
                                                        class="form-control input-text"
                                                        placeholder="Masukkan Alamat Rumah">
                                                </div>
                                                <div class="col edit-profil-right">
                                                    <label for="kodePos" class="form-label fw-semibold">Kode Pos</label>
                                                    <input type="text" id="kodePos" class="form-control input-text"
                                                        placeholder="Masukkan Kode Pos">
                                                </div>
                                                <div class="col edit-profil-right">
                                                    <label for="nomorTelepon" class="form-label fw-semibold">Nomor
                                                        Telepon</label>
                                                    <input type="number" id="nomorTelepon"
                                                        class="form-control input-text"
                                                        placeholder="Masukkan Nomor Telepon">
                                                </div>
                                                <div class="col edit-profil-right">
                                                    <label for="email" class="form-label fw-semibold">Email</label>
                                                    <input type="email" id="email" class="form-control input-text"
                                                        placeholder="Masukkan Email">
                                                </div>
                                                <div class="col edit-profil-right">
                                                    <label for="kualifikasiPendidikan"
                                                        class="form-label fw-semibold">Kualifikasi
                                                        Pendidikan</label>
                                                    <select name="" class="form-select input-text"
                                                        id="kualifikasiPendidikan">
                                                        <option value="" selected disabled>Pilih Kualifikasi
                                                            Pendidikan
                                                        </option>
                                                        <option value="">SD</option>
                                                        <option value="">SMP</option>
                                                        <option value="">SMK</option>
                                                    </select>
                                                </div>
                                                <div class="col edit-profil-right">
                                                    <label for="fotoProfil" class="form-label fw-semibold">Foto
                                                        Profil</label>
                                                    <input type="file" id="fotoProfil"
                                                        class="form-control form-control-lg input-text"
                                                        placeholder="Masukkan Nama Lengkap" style="padding: 11px 0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- DATA PEKERJAAN SEKARANG --}}
                                    <div class="row mt-5">
                                        <h5>B. Data Pekerjaan Sekarang</h5>
                                        <div class="col-lg-6">
                                            <div class="col edit-profil-left">
                                                <label for="namaInstitusi" class="form-label fw-semibold">Nama Institusi /
                                                    Perusahaan</label>
                                                <input type="text" id="namaInstitusi" class="form-control input-text"
                                                    placeholder="Masukkan Nama Institusi / Perusahaan">
                                            </div>
                                            <div class="col edit-profil-left">
                                                <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
                                                <input type="text" id="jabatan" class="form-control input-text"
                                                    placeholder="Masukkan Jabatan">
                                            </div>
                                            <div class="col edit-profil-left">
                                                <label for="alamatKantor" class="form-label fw-semibold">Alamat
                                                    Kantor</label>
                                                <input type="text" id="alamatKantor" class="form-control input-text"
                                                    placeholder="Masukkan Alamat Kantor">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="col edit-profil-right">
                                                <label for="kodePos" class="form-label fw-semibold">Kode Pos</label>
                                                <input type="text" id="kodePos" class="form-control input-text"
                                                    placeholder="Masukkan Kode Pos">
                                            </div>
                                            <div class="col edit-profil-right">
                                                <label for="nomorTeleponInstitusi" class="form-label fw-semibold">Nomor
                                                    Telepon Institusi / Perusahaan</label>
                                                <input type="number" id="nomorTeleponInstitusi"
                                                    class="form-control input-text"
                                                    placeholder="Masukkan Nomor Telepon Institusi / Perusahaan">
                                            </div>
                                            <div class="col edit-profil-right">
                                                <label for="emailInstitusi" class="form-label fw-semibold">Email Institusi
                                                    /
                                                    Perusahaan</label>
                                                <input type="email" id="emailInstitusi" class="form-control input-text"
                                                    placeholder="Masukkan Email Institusi / Perusahaan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary tombol-primary-small">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
