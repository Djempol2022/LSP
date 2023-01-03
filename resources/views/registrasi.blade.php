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
                    <form action="{{ route('Register') }}" method="POST">
                        @csrf
                        <input type="text" hidden name="role_id" value="4">
                        <div class="mb-2">
                            <label for="nama" class="register-label">Nama Lengkap</label>
                            <input
                                class="form-control login-input-text @error('nama_lengkap')
                                        is-invalid
                                    @enderror"
                                type="text" id="nama" name="nama_lengkap"
                                placeholder="Masukkan Nama Lengkap Anda Disini..." value="{{ old('nama_lengkap') }}"
                                required>
                        </div>
                        <div class="mb-2">
                            <label for="asal_sekolah" class="register-label sekolah">Asal Sekolah</label>
                            <select id="asal_sekolah" class="form-select register-input-select" name="sekolah_id" required>
                                <option value="" selected disabled>Pilih Asal Sekolah</option>
                                @foreach ($sekolah as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_sekolah }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="jurusan" class="register-label">Jurusan</label>
                            <select id="jurusan" class="form-select register-input-select jurusan" name="jurusan_id"
                                required>
                                <option value="" selected disabled>Pilih Jurusan</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="email_user" class="register-label">Email</label>
                            <input
                                class="form-control login-input-text @error('email')
                                        is-invalid
                                    @enderror"
                                type="email" name="email" id="email_user" placeholder="Masukkan Email Anda Disini..."
                                value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="password_user" class="register-label">Password</label>
                            <input
                                class="form-control login-input-text @error('password')
                                        is-invalid
                                    @enderror"
                                type="password" name="password" id="password_user"
                                placeholder="Masukkan Password Anda Disini..." value="{{ old('password') }}" required>
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
