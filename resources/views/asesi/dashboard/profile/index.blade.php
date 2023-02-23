@extends('layout.main-layout', ['title' => 'Profil'])
@section('main-section')
    <div class="container mt-5 jalur-file" id="profile-section">
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
            @if (is_null(\App\Models\UserDetail::where('user_id', auth()->user()->id)->first()->ktp_nik_paspor))
                <div class="alert fs-6" role="alert" style="background-color: #F8D7DA">
                    Lengkapi Profil untuk Melengkapi Formulir Permohonan Sertifikasi Kompetensi, sebagai Syarat untuk
                    Melakukan
                    Ujian Sertifikasi!
                </div>
            @endif
            <h5 class="text-black my-4">Permohonan Sertifikasi Kompetensi</h5>
            <div>
                <div class="col profil-section" style="margin-bottom:0% !important">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-lg-6 col-md-4 col-xs-6 thumb">
                                @isset($data->relasi_user_detail->foto)
                                    <img src="{{ asset('storage/' . $data->relasi_user_detail->foto) }}"
                                        class="img-thumbnail rounded-circle mb-3" alt="image">
                                @else
                                    <img src="/images/logo/favicon_lsp.png" class="img-thumbnail rounded-circle" alt="image">
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- RINCIAN DATA PEMOHON SERTIFIKASI --}}
            <div class="mb-5 pb-5" style="margin-bottom: 0% !important">
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
                <div class="col profil-section" style="margin-bottom:0% !important">
                    <h5>A. Data Pribadi</h5>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Lengkap</p>
                                <span
                                    class="
                  {{ auth()->user()->nama_lengkap ? '' : 'text-danger fw-semibold' }}">{{ auth()->user()->nama_lengkap ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Institusi / Perusahaan</p>
                                <span
                                    class="
                  {{ $data->relasi_institusi->nama_institusi ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_institusi->nama_institusi ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Jurusan</p>
                                <span
                                    class="
                  {{ $data->relasi_jurusan->jurusan ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_jurusan->jurusan ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Nomor KTP/NIK/Paspor</p>
                                <span
                                    class="
                  {{ $data->relasi_user_detail->ktp_nik_paspor ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->ktp_nik_paspor ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tempat Lahir</p>
                                <span
                                    class="
                  {{ $data->relasi_user_detail->tempat_lahir ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->tempat_lahir ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanggal Lahir</p>
                                <span
                                    class="
                  {{ $data->relasi_user_detail->tanggal_lahir ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->tanggal_lahir ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Jenis Kelamin</p>
                                <span
                                    class="text-capitalize
                  {{ $data->relasi_user_detail->jenis_kelamin ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->jenis_kelamin ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col pb-4">
                                <p class="fw-bold">Kebangsaan</p>
                                @isset($data->relasi_user_detail->relasi_kebangsaan->kebangsaan)
                                    <span>{{ $data->relasi_user_detail->relasi_kebangsaan->kebangsaan }}</span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Alamat Rumah</p>
                                <span
                                    class="
                  {{ $data->relasi_user_detail->alamat_rumah ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->alamat_rumah ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Kode Pos</p>
                                <span
                                    class="
                  {{ $data->relasi_user_detail->kode_pos ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->kode_pos ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Nomor Telepon</p>
                                <span
                                    class="
                  {{ $data->relasi_user_detail->nomor_hp ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->nomor_hp ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Email</p>
                                <span
                                    class="
                  {{ $data->email ? '' : 'text-danger fw-semibold' }}">{{ $data->email ?? 'Data Belum Lengkap!' }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Kualifikasi Pendidikan</p>
                                @isset($data->relasi_user_detail->relasi_kualifikasi_pendidikan->pendidikan)
                                    <span>{{ $data->relasi_user_detail->relasi_kualifikasi_pendidikan->pendidikan }}</span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
                {{-- DATA PEKERJAAN SEKARANG --}}
                <div class="col profil-section" style="margin-bottom:0% !important">
                    <h5>B. Data Pekerjaan Sekarang</h5>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Institusi / Perusahaan</p>
                                @isset($data->relasi_pekerjaan->nama_pekerjaan)
                                    <span>{{ $data->relasi_pekerjaan->nama_pekerjaan }}</span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Jabatan</p>
                                @isset($data->relasi_pekerjaan->jabatan)
                                    <span>{{ $data->relasi_pekerjaan->jabatan }}</span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Alamat Kantor</p>
                                @isset($data->relasi_pekerjaan->alamat_pekerjaan)
                                    <span>{{ $data->relasi_pekerjaan->alamat_pekerjaan }}</span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col pb-4">
                                <p class="fw-bold">Kode Pos</p>
                                @isset($data->relasi_pekerjaan->kode_pos)
                                    <span>{{ $data->relasi_pekerjaan->kode_pos }}</span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Nomor Telepon Institusi / Perusahaan</p>
                                @isset($data->relasi_pekerjaan->nomor_hp_pekerjaan)
                                    <span>{{ $data->relasi_pekerjaan->nomor_hp_pekerjaan }}</span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Email Institusi / Peerusahaan</p>
                                @isset($data->relasi_pekerjaan->email_pekerjaan)
                                    <span>{{ $data->relasi_pekerjaan->email_pekerjaan }}</span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DATA SERTIFIKASI --}}
            <div class="mb-5 pb-5" style="margin-bottom: 0% !important">
                <div class="col profil-section-title">
                    Bagian 2 : Data Sertifikasi
                </div>
                <p class="py-3" style="font-size: 18px">Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan
                    berikut.
                    Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan
                    latar
                    belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.
                </p>
                <div class="col profil-section" style="margin-bottom:0% !important">
                    <div class="col pb-45">
                        <p class="fw-bold">Judul Skema Sertifikasi</p>
                        @isset($data_skema_sertifikasi->judul_skema_sertifikasi)
                            <span>{{ $data_skema_sertifikasi->judul_skema_sertifikasi }}</span>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endisset
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Nomor Skema Sertifikasi</p>
                        @isset($data_skema_sertifikasi->nomor_skema_sertifikasi)
                            <span>{{ $data_skema_sertifikasi->nomor_skema_sertifikasi }}</span>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endisset
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Tujuan Asesmen</p>
                        @isset($tujuan_sertifikasi->tujuan_asesi)
                            <span class="text-capitalize">{{ $tujuan_sertifikasi->tujuan_asesi }}</span>
                        @else
                            <span class="text-danger fw-semibold text-capitalize">Data Belum Lengkap!</span>
                        @endisset
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Daftar Unit Kompetensi Sesuai Kemasan</p>
                        @if (!empty($unit_kompetensi))
                            <div class="table-responsive text-center text-wrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Unit</th>
                                            <th>Judul Unit</th>
                                            <th>Jenis Standar (Standar Khusus/Standar Internasional/SKKNI)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($unit_kompetensi as $no => $data_unit_kompetensi)
                                            <tr>
                                                <th>{{ $no + 1 }}</th>
                                                <td>{{ $data_unit_kompetensi->kode_unit }}</td>
                                                <td>{{ $data_unit_kompetensi->judul_unit }}</td>
                                                <td>{{ $data_unit_kompetensi->jenis_standar }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- BUKTI KELENGKAPAN PEMOHON --}}
            <div class="mb-5 pb-5" style="margin-bottom: 0% !important">
                <div class="col profil-section-title">
                    Bagian 3 : Bukti Kelengkapan Pemohon
                </div>
                <p class="py-3" style="font-size: 18px">Bukti Persyaratan Dasar Pemohon.</p>
                <div class="col profil-section" style="margin-bottom:0% !important">
                    <div class="col pb-45">
                        <p class="fw-bold">Kartu Keluarga</p>
                        @if (!empty($kartu_keluarga))
                            <p>{{ $kartu_keluarga }}</p>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endif
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Kartu Pelajar</p>
                        @if (!empty($kartu_pelajar))
                            <p>{{ $kartu_pelajar }}</p>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endif
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Pas Foto</p>
                        @if (!empty($pas_foto))
                            <p>{{ $pas_foto }}</p>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endif
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Sertifikat Prakerin atau Surat Keterangan Telah Melaksanakan Praktek Kerja
                            Industri</p>
                        @if (!empty($sertifikat_prakerin))
                            <p>{{ $sertifikat_prakerin }}</p>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endif
                    </div>
                    <div class="col pb-45">
                        <p class="fw-bold">Nilai Raport</p>
                        @if (!empty($nilai_raport))
                            <p>{{ $nilai_raport }}</p>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- HASIL PERSYARATAN --}}
            <div class="mb-5 pb-5" style="margin-bottom: 0% !important">
                <div class="col profil-section-title">
                    Hasil Persyaratan
                </div>
                <div class="col profil-section" style="margin-bottom:0% !important">
                    <div class="row my-4">
                        {{-- PEMOHON / KANDIDAT --}}
                        <div class="col-md-6">
                            <h5 class="pb-4">Pemohon / Kandidat :</h5>
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Lengkap</p>
                                <span>{{ auth()->user()->nama_lengkap }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanda Tangan</p>
                                @isset($data->relasi_user_detail->ttd)
                                    <img src="{{ $data->relasi_user_detail->ttd }}" alt="ttd" width="180px">
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanggal</p>
                                @isset($tanggal)
                                    <span>{{ $tanggal }}</span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                        </div>
                        {{-- ADMIN LSP --}}
                        <div class="col-md-6">
                            <h5 class="pb-4">Admin LSP :</h5>
                            <div class="col pb-4">
                                <p class="fw-bold">Nama Lengkap</p>
                                @isset($data->relasi_sertifikasi->relasi_tanda_tangan_admin->nama_admin)
                                    <span class="fw-semibold">
                                        {{ $data->relasi_sertifikasi->relasi_tanda_tangan_admin->nama_admin }}
                                    </span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">No. Reg</p>
                                @isset($data->relasi_sertifikasi->relasi_tanda_tangan_admin->no_reg)
                                    <span class="fw-semibold">
                                        {{ $data->relasi_sertifikasi->relasi_tanda_tangan_admin->no_reg }}
                                    </span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanda Tangan</p>
                                @isset($data->relasi_sertifikasi->relasi_tanda_tangan_admin->ttd_admin)
                                    <img src="{{ $data->relasi_sertifikasi->relasi_tanda_tangan_admin->ttd_admin }}"
                                        alt="ttd_admin" width="180px">
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanggal</p>
                                @isset($data->relasi_sertifikasi->relasi_tanda_tangan_admin->tanggal)
                                    <span class="fw-semibold">
                                        {{ $data->relasi_sertifikasi->relasi_tanda_tangan_admin->tanggal }}
                                    </span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Catatan</p>
                                @isset($data->relasi_sertifikasi->relasi_tanda_tangan_admin->catatan)
                                    <span class="fw-semibold">
                                        {{ $data->relasi_sertifikasi->relasi_tanda_tangan_admin->catatan }}
                                    </span>
                                @else
                                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="pt-5">
                        <span>Berdasarkan ketentuan persyaratan dasar, maka pemohon:</span><br>
                        <p>
                            @php
                                $sertifikasi = \App\Models\Sertifikasi::where('user_id', Auth::user()->id)->first() ?? new \App\Models\Sertifikasi();
                                $acc_admin = \App\Models\TandaTangan::with('relasi_sertifikasi')
                                    ->where('sertifikasi_id', $sertifikasi->id)
                                    ->first();
                            @endphp
                            @isset($acc_admin)
                                @if ($acc_admin->status == 0)
                                    <span class="fw-bold"><s>Diterima</s></span>
                                    <span class="fw-bold">/</span>
                                    <span class="fw-bold">Tidak Diterima</span>
                                @elseif ($acc_admin->status == 1)
                                    <span class="fw-bold">Diterima</span>
                                    <span class="fw-bold">/</span>
                                    <span class="fw-bold"><s>Tidak Diterima</s></span>
                                @endif
                            @else
                                <span class="fw-bold">Diterima</span>
                                <span class="fw-bold">/</span>
                                <span class="fw-bold">Tidak Diterima</span>
                            @endisset
                            sebagai peserta sertifikasi
                        </p>
                        <button type="button" class="btn btn-primary tombol-primary-medium mt-5" id="edit-btn"
                            data-bs-toggle="modal" data-bs-target="#editProfil">Edit Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('asesi.dashboard.profile._form-modal')
@endsection
