@extends('layout.main-layout', ['title' => 'Profil'])
@section('main-section')
    <div id="detail-profil">
        <div class="col profil-section" style="margin-bottom:0% !important">
            @if (is_null(\App\Models\UserDetail::where('user_id', auth()->user()->id)->first()->tempat_lahir))
                <div class="alert fs-6" role="alert" style="background-color: #F8D7DA">
                    Silahkan lengkapi profil anda !
                </div>
            @endif
            <div class="row mt-3">
                <div class="col-md-2 px-2">
                    @isset($data->relasi_user_detail->foto)
                        <img src="{{ asset('storage/' . $data->relasi_user_detail->foto) }}" class="img-thumbnail rounded-circle mb-3"
                            alt="image" style="width: 100px; height: 100px;object-fit: cover;">
                    @else
                        <img src="/images/logo/favicon.png" class="img-thumbnail rounded-circle" alt="image">
                    @endisset
                </div>
            </div>
            <div class="col profil-section-title mt-4">
                Detail lengkap profil pengguna
            </div>
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
                        <p class="fw-bold">Jabatan</p>
                        <span>
                            Admin LSP
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Jenis Kelamin</p>
                        <span
                            class="text-capitalize{{ $data->relasi_user_detail->jenis_kelamin ? '' : ' text-danger fw-semibold' }}">
                            {{ $data->relasi_user_detail->jenis_kelamin ?? 'Data Belum Lengkap!' }}
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
                </div>
                <div class="col-md-6">
                    <div class="col pb-4">
                        <p class="fw-bold">Alamat Rumah</p>
                        @isset($data->relasi_user_detail->alamat_rumah)
                            <span>
                                {{ $data->relasi_user_detail->alamat_rumah }}
                            </span>
                        @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                        @endisset
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Email</p>
                        <span class="{{ $data->email ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->email ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                    <div class="col pb-4">
                        <p class="fw-bold">Nomor Reg</p>
                        <span class="{{ $data->relasi_user_detail->no_reg ? '' : 'text-danger fw-semibold' }}">
                            {{ $data->relasi_user_detail->no_reg ?? 'Data Belum Lengkap!' }}
                        </span>
                    </div>
                </div>
                <div class="row my-4">
                    <button type="button" class="btn btn-primary tombol-primary-medium" id="edit-btn"
                        data-bs-toggle="modal" data-bs-target="#editProfil">Edit Profil</button>
                </div>
            </div>
        </div>
    </div>
    @include('admin.profil._modal-edit-profil')
@endsection
