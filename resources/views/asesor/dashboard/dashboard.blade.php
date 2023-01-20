@extends('layout.main-layout', ['title' => 'Dashboard'])
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            {{-- FOTO PEMBUKA --}}
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
                                <th class="text-end" scope="col">No</th>
                                <th class="text-center"  scope="col">Asesi</th>
                                <th class="text-center"  scope="col">Tanggal</th>
                                <th class="text-center"  scope="col">Waktu</th>
                                <th class="text-center"  scope="col">MUK</th>
                                <th class="text-center"  scope="col">TUK</th>
                                <th class="text-center"  scope="col">Jenis Tes</th>
                                <th class="text-center"  scope="col">Kelas</th>
                                <th class="text-center"  scope="col">Sesi</th>
                                <th class="text-center"  scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>  
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                    </tbody>
                    </table>
                   
                </div>
            </div>
            {{-- TOMBOL MENU PROFIL --}}
            <div class="col-auto foto-profile">
                <a href="{{ route('asesi.Dashboard.Profile') }}">
                    <div class="row bg-profile px-4 py-4 align-items-center">
                        <div class="col-auto col-foto-profile">
                            <img src="/images/logo/favicon.png" style="width: 85%" class="rounded-circle" alt="">
                        </div>
                        <div class="col-9 row p-0">
                            <div class="col-auto col-tulisan-profile">
                                <span class="tulisan-profile">Profil</span>
                            </div>
                            <div class="col-12">
                                <span class="tulisan-nama">{{ $user->nama_lengkap }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
