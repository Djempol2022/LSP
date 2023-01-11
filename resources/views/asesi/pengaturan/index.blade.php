@extends('layout.main-layout', ['title' => 'Pengaturan'])
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
                    href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Pengaturan</li>
        </ol>
    </nav>
    <div class="container px-4 mt-5">
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
    </div>

    {{-- MODAL UBAH PASSWORD --}}
    <div class="modal fade" id="ubahPassword" tabindex="-1" aria-labelledby="ubahPasswordLabel" aria-hidden="true">
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
@endsection
