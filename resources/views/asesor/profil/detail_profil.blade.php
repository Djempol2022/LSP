@extends('layout.main-layout', ['title' => 'Profil'])
@section('main-section')
    <div>
        <div class="col profil-section" style="margin-bottom:0% !important">
            @if (is_null(\App\Models\UserDetail::where('user_id', auth()->user()->id)->first()->ktp_nik_paspor))
                <div class="alert fs-6" role="alert" style="background-color: #F8D7DA">
                    Silahkan lengkapi profil anda untuk menggunakan fitur asesor / peninjau !
                </div>
            @endif
            <div class="row">
                <div class="col-md-3">
                    <div class="col-lg-6 col-md-4 col-xs-6 thumb">
                        <img src="/images/logo/favicon_lsp.png" class="img-thumbnail rounded-circle" alt="image">
                    </div>
                </div>
            </div>
            <div class="col profil-section-title mt-4">
                Detail lengkap profil pengguna
            </div>
            <p class="py-2" style="font-size: 18px">
                Pada bagian ini, cantumkan data pribadi, data pendidikan formal
                serta
                data pekerjaan
                anda saat
                ini.
            </p>
            <h5 class="mt-3">A. Data Pribadi</h5>
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="col pb-4">
                        <p class="fw-bold">Nama Lengkap</p>
                        <span class="{{ auth()->user()->nama_lengkap ? '' : 'text-danger fw-semibold' }}">
                            {{ auth()->user()->nama_lengkap ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Nama Institusi / Perusahaan</p>
                        <span class="{{ $data->relasi_institusi->nama_institusi ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->relasi_institusi->nama_institusi ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Jurusan</p>
                        <span class="{{ $data->relasi_jurusan->jurusan ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->relasi_jurusan->jurusan ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Nomor KTP/NIK/Paspor</p>
                        <span class="{{ $data->relasi_user_detail->ktp_nik_paspor ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->relasi_user_detail->ktp_nik_paspor ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Tempat Lahir</p>
                        <span class="{{ $data->relasi_user_detail->tempat_lahir ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->relasi_user_detail->tempat_lahir ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Tanggal Lahir</p>
                        <span class="{{ $data->relasi_user_detail->tanggal_lahir ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->relasi_user_detail->tanggal_lahir ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Jenis Kelamin</p>
                        <span
                            class="text-capitalize{{ $data->relasi_user_detail->jenis_kelamin ? '' : ' text-danger fw-semibold' }}">
                            {{ $data->relasi_user_detail->jenis_kelamin ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col pb-4">
                        <p class="fw-bold">Kebangsaan</p>
                        @isset($data->relasi_user_detail->relasi_kebangsaan->kebangsaan)
                            <span>
                                {{ $data->relasi_user_detail->relasi_kebangsaan->kebangsaan }}
                            </span>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endisset
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Alamat Rumah</p>
                        <span class="{{ $data->relasi_user_detail->alamat_rumah ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->relasi_user_detail->alamat_rumah ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Kode Pos</p>
                        <span class="{{ $data->relasi_user_detail->kode_pos ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->relasi_user_detail->kode_pos ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Nomor Telepon</p>
                        <span class="{{ $data->relasi_user_detail->nomor_hp ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->relasi_user_detail->nomor_hp ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Email</p>
                        <span class="{{ $data->email ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->email ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Kualifikasi Pendidikan</p>
                        @isset($data->relasi_user_detail->relasi_kualifikasi_pendidikan->pendidikan)
                            <span>{{ $data->relasi_user_detail->relasi_kualifikasi_pendidikan->pendidikan }}
                            </span>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endisset
                    </div>
                </div>
            </div>
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
                <button type="button" class="btn btn-primary tombol-primary-medium mt-5" id="edit-btn"
                    data-bs-toggle="modal" data-bs-target="#editProfil">Edit Profil</button>
            </div>
        </div>
    </div>
    @include('asesor.profil._modal-edit-profil')
@endsection
