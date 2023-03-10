@extends('layout.main-layout', ['title' => 'Dashboard'])
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            {{-- FOTO PEMBUKA --}}
            <div class="col-auto foto-dashboard" style="margin-bottom: 2%;">
                <img src="/images/dashboard.png" style="width: 100%" alt="">
                <div class="col-auto bg-profile" style="margin: 0 2%">
                    <div class="col p-3">
                        <h5 class="text-black">Jadwal Assesment</h5>
                        <span class="text-black">Jadwal ujian berdasarkan SK pelaksanaan</span>
                    </div>
                    <table class="table tabel-jadwal text-black">
                        <thead>
                            <tr class="teks-tabel">
                                <th class="text-end" style="width: 7%" scope="col">No</th>
                                <th class="text-center" style="width: 17.5%" scope="col">MUK</th>
                                <th class="text-center" style="width: 22%" scope="col">Hari/Tanggal</th>
                                <th class="text-center" style="width: 15.5%" scope="col">TUK</th>
                                <th class="text-center" style="width: 25%" scope="col">Nama Asesor</th>
                                <th class="text-center" style="width: 18%" scope="col">Jenis Tes</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="text-center pb-3 text-black">
                        <small>Data Not Found.</small>
                    </div>
                </div>
            </div>
            {{-- TOMBOL MENU PROFIL --}}
            <div class="col-auto foto-profile">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <a href="{{ route('asesi.Dashboard.Profile') }}">
                            <div class="d-flex align-items-center">
                                <div class="thumb-profil thumb">
                                    @isset(Auth::user()->relasi_user_detail->foto)
                                        <img src="{{ asset('storage/' . Auth::user()->relasi_user_detail->foto) }}" class="img-thumbnail rounded-circle mb-3"
                                            alt="image" style="width: 50%; height: 50%; object-fit: cover;">
                                    @else
                                        <img src="{{asset('images/8.jpg')}}" class="img-thumbnail rounded-circle mb-3" alt="Face 1">                               
                                    @endisset
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">{{ Auth::user()->nama_lengkap }}</h5>
                                    <h6 class="text-muted mb-0">Asesi</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
             </div>
        </div>
    @endsection

{{-- 
@section('main-section')
<div class="page-content">
    <section class="row">
            <div class="col-auto foto-dashboard">
                <img src="/images/dashboard.png" style="width: 100%" alt="">
                <div class="col-auto bg-profile" style="margin: 0 2%">
                    <div class="col p-3">
                        <h5 class="text-black">Jadwal Assesment</h5>
                        <span class="text-black">Jadwal ujian berdasarkan SK pelaksanaan</span>
                    </div>
                    <table class="table tabel-jadwal text-black">
                        <thead>
                            <tr class="teks-tabel">
                                <th class="text-end" style="width: 7%" scope="col">No</th>
                                <th class="text-center" style="width: 17.5%" scope="col">MUK</th>
                                <th class="text-center" style="width: 22%" scope="col">Hari/Tanggal</th>
                                <th class="text-center" style="width: 15.5%" scope="col">TUK</th>
                                <th class="text-center" style="width: 25%" scope="col">Nama Asesor</th>
                                <th class="text-center" style="width: 18%" scope="col">Jenis Tes</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="text-center pb-3 text-black">
                        <small>Data Not Found.</small>
                    </div>
                </div>
            </div>
            <div class="col-auto foto-profile">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <a href="{{ route('asesi.Dashboard.Profile') }}">
                            <div class="d-flex align-items-center">
                                <div class="thumb-profil thumb">
                                    @isset(Auth::user()->relasi_user_detail->foto)
                                        <img src="{{ asset('storage/' . Auth::user()->relasi_user_detail->foto) }}" class="img-thumbnail rounded-circle mb-3"
                                            alt="image" style="width: 50%; height: 50%; object-fit: cover;">
                                    @else
                                        <img src="{{asset('images/8.jpg')}}" alt="Face 1">                               
                                    @endisset
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">{{ Auth::user()->nama_lengkap }}</h5>
                                    <h6 class="text-muted mb-0">Asesi</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
             </div>
    </section>
</div>
@endsection --}}
