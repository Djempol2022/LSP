@extends('layout.main-layout', ['title' => 'Data Ujian'])
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
                        <th class="px-4" style="width: 70%" scope="col">Jurusan</th>
                        <th class="px-4" style="width: 70%" scope="col">Jenis</th>
                        <th class="px-4" style="width: 70%" scope="col">Status</th>
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
                        <td class="text-center">
                            <button class="btn btn-warning my-1 text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                            </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
     
    </div>
@endsection
