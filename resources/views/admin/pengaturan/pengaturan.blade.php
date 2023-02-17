@extends('layout.main-layout', ['title'=>'Pengaturan'])
@section('main-section')
    @if (session()->has('berhasil'))
        <div class="alert alert-success" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif
    @error('password_lama')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    @error('password_baru')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    {{-- JALUR FILE --}}
    <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                    href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Pengaturan</li>
        </ol>
    </nav>
    {{-- <div class="container px-4 mt-5">
        <div class="row gap-5">
            <button type="button" data-bs-toggle="modal" data-bs-target="#ubahPassword"
                class="row col-auto gap-2 menu-setting align-items-center">
                <div class="col-3 my-4">
                    <img src="/images/change-password.png" alt="">
                </div>
                <div class="col">
                    <span>Edit Password</span>
                </div>
            </button>
        </div>
    </div> --}}

    {{-- MODAL UBAH PASSWORD --}}
    {{-- <div class="modal fade" id="ubahPassword" tabindex="-1" aria-labelledby="ubahPasswordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ubahPasswordLabel">Edit Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('asesi.cgPassword') }}" method="POST">
                        @csrf
                        <div class="col">
                            <label for="password-lama" class="col-form-label fw-bold text-black">Password Lama</label>
                            <input type="password" name="password_lama"
                                class="form-control @error('password_lama')
                                        is-invalid
                                    @enderror"
                                id="password-lama" required>
                            @error('password_lama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="password-baru" class="col-form-label fw-bold text-black">Password Baru</label>
                            <input type="password" name="password_baru"
                                class="form-control @error('password_baru')
                                        is-invalid
                                    @enderror"
                                id="password-baru" required>
                            @error('password_baru')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mt-4">
                            <button type="submit" class="btn btn-primary tombol-primary-max">Simpan
                                Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ubahPassword">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="fa fa-key fa-lg" style="color: white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7" style="padding-right: calc(var(--bs-gutter-x) * 0.2)">
                                        <h6 class="font-extrabold mb-0">Edit Password</h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="{{ route('admin.DaftarJurusan') }}">
                                    <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="fa fa-window-restore fa-lg" style="color: white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7" style="padding-right: calc(var(--bs-gutter-x) * 0.2)">
                                        <h6 class="font-extrabold mb-0">Jurusan</h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="{{ route('admin.DaftarInstitusi') }}">
                                    <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="fa fa-building fa-lg" style="color: white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7" style="padding-right: calc(var(--bs-gutter-x) * 0.2)">
                                        <h6 class="font-extrabold mb-0">Institusi</h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="{{ route('admin.DaftarKualifikasiPendidikan') }}">
                                    <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon orange mb-2">
                                            <i class="fa fa-user-tie fa-lg" style="color: white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7" style="padding-right: calc(var(--bs-gutter-x) * 0.2)">
                                        <h6 class="font-extrabold mb-0">Kualifikasi Pendidikan</h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="{{ route('admin.DaftarMUK') }}">
                                    <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="fa fa-paste fa-lg" style="color: white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7" style="padding-right: calc(var(--bs-gutter-x) * 0.2)">
                                        <h6 class="font-extrabold mb-0">Materi Uji Kompetensi</h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="{{route('admin.HalamanDataNamaTUK')}}">
                                    <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon grey mb-2">
                                            <i class="fa fa-map-marker-alt fa-lg" style="color: white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7" style="padding-right: calc(var(--bs-gutter-x) * 0.2)">
                                        <h6 class="font-extrabold mb-0">Tempat Uji Kompetensi</h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </div>

<div class="modal fade" id="ubahPassword" tabindex="-1" aria-labelledby="ubahPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahPasswordLabel">Edit Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="isi-password" method="post" action="{{ route('UbahPassword') }}">
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

@endsection
@section('script')
<script>
    $('#isi-password').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                // $(document).find('span.error-text').text('');
                $(document).find('label.error-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('label.' + prefix + '_error').text(val[0]);
                        // $('span.'+prefix+'_error').text(val[0]);
                    });
                } else {
                    $('#isi-password')[0].reset();
                    // alert(data.msg);
                    swal("Berhasil!", data.msg, "success");
                }
            }
        });
    });

    function password_show_hide1() {
        var x = document.getElementById("passwordlama");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function password_show_hide2() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye2");
        var hide_eye = document.getElementById("hide_eye2");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function password_show_hide3() {
        var x = document.getElementById("konfirmasipasswordbaru");
        var show_eye = document.getElementById("show_eye3");
        var hide_eye = document.getElementById("hide_eye3");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

</script>
@endsection