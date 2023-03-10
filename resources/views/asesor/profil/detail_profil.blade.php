@extends('layout.main-layout', ['title' => 'Profil'])
@section('main-section')
<div class="card">
    <div class="card-body">
        <div id="detail-profil">
            <div class="col profil-section" style="margin-bottom:0% !important">
                @if (is_null(\App\Models\UserDetail::where('user_id', auth()->user()->id)->first()->tanggal_lahir))
                    <div class="alert fs-6" role="alert" style="background-color: #F8D7DA">
                        Silahkan lengkapi profil anda !
                    </div>
                @endif
                <div class="thumb-profil thumb">
                    @isset($data->relasi_user_detail->foto)
                        <img src="{{ asset('storage/' . $data->relasi_user_detail->foto) }}" class="img-thumbnail rounded-circle mb-3"
                            alt="image" style="width: 100px; height: 100px;object-fit: cover;">
                    @else
                        <img src="/images/logo/favicon.png" class="img-thumbnail rounded-circle" alt="image">
                    @endisset
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
                            <p class="fw-bold">Jurusan</p>
                            <span class="{{ $data->relasi_jurusan->jurusan ? '' : 'text-danger fw-semibold' }}">
                                {{ $data->relasi_jurusan->jurusan ?? 'Data Belum Lengkap!' }}
                            </span>
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
                            <p class="fw-bold">Tempat Lahir</p>
                            <span class="{{ $data->relasi_user_detail->tempat_lahir ? '' : 'text-danger fw-semibold' }}">
                                {{ $data->relasi_user_detail->tempat_lahir ?? 'Data Belum Lengkap!' }}
                            </span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Alamat Rumah</p>
                            <span class="{{ $data->relasi_user_detail->alamat_rumah ? '' : 'text-danger fw-semibold' }}">
                                {{ $data->relasi_user_detail->alamat_rumah ?? 'Data Belum Lengkap!' }}
                            </span>
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
                </div>
                <div class="row my-4">
                    <button type="button" class="btn btn-info tombol-primary-medium" style="background-color: #0080c5"
                        data-bs-toggle="modal" data-bs-target="#ubahPassword">Ubah Password</button>
                </div>
                <div class="row my-4">
                    <button type="button" class="btn btn-primary tombol-primary-medium" id="edit-btn"
                        data-bs-toggle="modal" data-bs-target="#editProfil">Edit Profil</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="ubahPassword" tabindex="-1" aria-labelledby="ubahPasswordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ubahPasswordLabel">Edit Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" id="edit-password-asesor" method="post" action="{{ route('UbahPassword') }}">
                        @csrf
                        <div class="form-group">
                            <div class="col">
                                <label for="validationCustom01" class="form-label" style="font-size: medium;">Password
                                    Lama</label>
                                <div class="input-group has-validation">
                                    <input name="passwordlama" type="password" class="form-control" id="passwordlama" />
                                    <span class="input-group-text" onclick="password_show_hide1();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text passwordlama_error"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <label for="validationCustom01" class="form-label" style="font-size: medium;">Password
                                    Baru</label>
                                <div class="input-group has-validation">
                                    <input name="password" type="password" class="input form-control" id="password" />
                                    <span class="input-group-text" onclick="password_show_hide2();">
                                        <i class="fas fa-eye" id="show_eye2"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye2"></i>
                                    </span>
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text password_error"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <label for="validationCustom01" class="form-label" style="font-size: medium;">Konfirmasi
                                    Password Baru</label>
                                <div class="input-group has-validation">
                                    <input name="konfirmasipasswordbaru" type="password" class="input form-control"
                                        id="konfirmasipasswordbaru" />
                                    <span class="input-group-text" onclick="password_show_hide3();">
                                        <i class="fas fa-eye" id="show_eye3"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye3"></i>
                                    </span>
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text konfirmasipasswordbaru_error"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col pt-3">
                            <button type="submit" class="btn btn-dark mr-2 btn-block py-3"
                                style="border: none;background: #4747A1;border-radius: 10px;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('asesor.profil._modal-edit-profil')
@endsection