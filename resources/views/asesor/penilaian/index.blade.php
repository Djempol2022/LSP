@extends('layout.main-layout', ['title' => 'Kelola Soal'])
@section('main-section')
    <div class="container-fluid">
        {{-- JALUR FILE --}}
        <nav class="jalur-file mb-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                        href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Assesment</li>
            </ol>
        </nav>
        <div class="col-auto card-assesment">
            <h5>Data  Ujian</h5>
            <p>Daftar Ujian yang akan dan sedang berlangsung</p>
            <table class="table tabel-muk">
                <thead>
                    <tr>
                        <th class="px-4" style="width: 70%" scope="col">Nama</th>
                        <th class="px-4" style="width: 70%" scope="col">Tanggal</th>
                        <th class="px-4" style="width: 70%" scope="col">Waktu</th>
                        <th class="px-4" style="width: 70%" scope="col">MUK</th>
                        <th class="px-4" style="width: 70%" scope="col">TUK</th>
                        <th class="px-4" style="width: 70%" scope="col">Jenis</th>
                        <th class="text-center" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold">
                    <tr>
                        <td class="my-1 px-4"></td>
                        <td class="my-1 px-4"></td>
                        <td class="my-1 px-4"></td>
                        <td class="my-1 px-4"></td>
                        <td class="my-1 px-4"></td>
                        <td class="my-1 px-4"></td>
                        <td class="text-center">
                            <button class="btn btn-warning my-1 text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                            </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
     
    </div>
@endsection
