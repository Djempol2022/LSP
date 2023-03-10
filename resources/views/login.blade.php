@extends('layout.main-layout', ['title' => 'Login'])
@section('login')
    <div class="row login-row">
        {{-- ALERT --}}
        @if (session()->has('success'))
            <div class="alert alert-success sticky-top" style="position: absolute; z-index: 10;" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('loginError'))
            <div class="alert alert-danger sticky-top" style="position: absolute; z-index: 10;" role="alert">
                {{ session('loginError') }}
            </div>
        @endif
        {{-- IMAGE LEFT --}}
        <div class="col-sm-6 px-0 login">
            <img src="images/login.png" alt="Login image" class="w-100 vh-100"
                style="object-fit: cover; object-position: center;">
        </div>

        {{-- INPUT LOGIN --}}
        <div class="container-fluid p-4 col-sm-6 justify-content-center align-items-center d-flex">
            <div class="col-md-6 ">
                <img src="images/logo/logo.png" alt="">
                <div class="login-title mt-4">Login</div>
                <div class="col-md-10">
                    <p class="text-login">Login untuk masuk ke dalam aplikasi.</p>
                </div>
                <div>
                    <form action="{{ route('Auth') }}" method="POST" id="formLogin">
                        @csrf
                        <div class="mb-3">
                            <label for="email_user" class="login-label">Email</label>
                            <input class="form-control login-input-text" type="email" name="email" id="email_user"
                                placeholder="Masukkan Email Anda Disini...">
                        </div>
                        <div class="mb-3">
                            <label for="password_user" class="login-label">Password</label>
                                <div class="input-group has-validation">
                                    <input name="password" type="password" id="password_user" class="form-control login-input-text" placeholder="Masukkan Password Anda Disini..."/>
                                    <span class="input-group-text" onclick="password_login_show();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text password_error"></label>
                                    </div>
                                </div>
                            {{-- <label for="password_user" class="login-label">Password</label>
                            <input class="form-control login-input-text" name="password" type="password" id="password_user"
                                placeholder="Masukkan Password Anda Disini..."> --}}
                        </div>
                        <div class="my-4">
                            <button type="submit" class="tombol-primary-max">Login</button>
                        </div>
                        <div class="mb-3 justify-content-center d-flex">
                            <div class="text-register">Tidak punya akun? <a href="registrasi"
                                    class="fw-bolder warna-secondary">Buat akun
                                    sekarang</a>
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

        function password_login_show() {
            var x = document.getElementById("password_user");
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
        $('#formLogin').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function(data) {
                    if (data.status == 0) {
                        swal({
                            title: "Login gagal !",
                            text: `${data.msg}`,
                            icon: "error",
                            successMode: true
                        });
                    } else if (data.status == 1) {
                        swal({
                                title: "Login berhasil !",
                                text: `${data.msg}`,
                                icon: "success",
                                successMode: true,
                            }),
                            setTimeout(function() {
                                window.location.href = `${data.route}`;
                            }, 1000); // 1 second
                    }
                }
            });
        });
    </script>
@endsection
