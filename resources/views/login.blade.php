@extends('layout.main-layout', ['title'=>'Login'])
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
                    <form action="{{ route('Auth') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email_user" class="login-label">Email</label>
                            <input class="form-control login-input-text" type="email" name="email" id="email_user"
                                placeholder="Masukkan Email Anda Disini...">
                        </div>
                        <div class="mb-3">
                            <label for="password_user" class="login-label">Password</label>
                            <input class="form-control login-input-text" name="password" type="password" id="password_user"
                                placeholder="Masukkan Password Anda Disini...">
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
