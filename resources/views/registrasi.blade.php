@extends('layout.main-layout')
@section('login')
    <div class="row login-row">
        {{-- GAMBAR KIRI --}}
        <div class="col-sm-6 px-0">
            <img src="images/login.png" alt="Login image" class="w-100 vh-100"
                style="object-fit: cover; object-position: center;">
        </div>
        {{-- MAIN --}}
        <div class="container-fluid p-4 col-sm-6 justify-content-center align-items-center d-flex">
            <div class="col-md-7">
                <img src="images/logo/logo.png" alt="">
                <div class="login-title mt-4">Registrasi</div>
                <div class="col-md-11">
                    <p class="text-login">Daftar akun untuk penggunaan aplikasi LSP lebih lanjut</p>
                </div>
                <div>
                    {{-- FORM PENDAFTAR --}}
                    <form action="{{ route('Register') }}" method="POST" id="formRegister">
                        @csrf
                        <input type="text" hidden name="role_id" value="4">
                        <div class="mb-2">
                            <label for="nama" class="register-label">Nama Lengkap</label>
                            <input class="form-control login-input-text"
                                type="text" id="nama" name="nama_lengkap"
                                placeholder="Masukkan Nama Lengkap Anda Disini..." value="{{ old('nama_lengkap') }}">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text nama_lengkap_error"></label>
                                </div>
                        </div>
                        <div class="mb-2">
                            <label for="asal_sekolah" class="register-label sekolah">Asal Sekolah</label>
                            <select id="asal_sekolah" class="form-select register-input-select" name="institusi_id" required>
                                <option value="" selected disabled>Pilih Asal Sekolah</option>
                                @foreach ($sekolah as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_institusi }}</option>
                                @endforeach
                            </select>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text institusi_id_error"></label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="jurusan" class="register-label">Jurusan</label>
                            <select id="jurusan" class="form-select register-input-select jurusan" name="jurusan_id"
                                required>
                                @foreach ($jurusan as $data)
                                    <option value="{{ $data->id }}">{{ $data->jurusan }}</option>
                                @endforeach
                            </select>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text jurusan_id_error"></label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="email_user" class="register-label">Email</label>
                            <input class="form-control login-input-text"
                                type="email" name="email" id="email_user" placeholder="Masukkan Email Anda Disini..."
                                value="{{ old('email') }}">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text email_error"></label>
                                </div>
                        </div>
                        <div class="mb-2">
                            <label for="password_user" class="register-label">Password</label>
                            <input
                                class="form-control login-input-text"
                                type="password" name="password" id="password_user"
                                placeholder="Masukkan Password Anda Disini..." value="{{ old('password') }}">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text password_error"></label>
                                </div>
                        </div>
                        <div class="my-3">
                            <button type="submit" class="tombol-primary-max">Registrasi</button>
                        </div>
                        <div class="mb-2 justify-content-center d-flex">
                            <div class="text-register">Sudah punya akun? <a href="login"
                                    class="fw-bolder warna-secondary">Login sekarang</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
    $('#formRegister').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('label.error-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('label.' + prefix + '_error').text(val[0]);
                        // $('span.'+prefix+'_error').text(val[0]);
                    });
                } 
                else if(data.status == 1){
                    swal({
                        title: "Berhasil",
                        text: `${data.msg}`,
                        icon: "success",
                        buttons: true,
                        successMode: true,
                    }),
                    setTimeout(function() {
                        window.location.href = "{{ route('Login')}}";
                    }, 2000); // 2 second
                }
            }
        });
    });
    </script>
@endsection