@extends('layout.main-layout')
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
        {{-- ASSESMENT MANDIRI --}}
        <div class="col-auto card-assesment mb-5">
            <h5>Formulir Assesment Mandiri</h5>
            <p>Isi formulir assesment mandiri dengan menekan tombol di bawah, untuk melanjutkan assesment </p>
            <button type="button" class="btn btn-primary tombol-primary-small">Assesment Mandiri</button>
        </div>
        {{-- TABEL MATERI UJI KOMPETENSI --}}
        <div class="col-auto card-assesment">
            <h5>Materi Uji Kompetensi</h5>
            <p>Daftar Materi Uji Kompetensi LSP Multimedia</p>
            <table class="table tabel-muk">
                <thead>
                    <tr>
                        <th class="px-4" style="width: 70%" scope="col">Materi Uji Kompetensi</th>
                        <th class="text-center" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold">
                    <tr>
                        <td class="my-1 px-4">Desain Grafis Percetakkan (Stiker dan Packaging)</td>
                        <td class="text-center"><button class="btn btn-warning my-1 text-black">Detail
                                Ujian</button></td>
                    </tr>
                    <tr>
                        <td class="my-1 px-4">Desain Grafis Percetakkan (Stiker dan Packaging)</td>
                        <td class="text-center"><button class="btn btn-warning my-1 text-black">Detail
                                Ujian</button></td>
                    </tr>
                    <tr>
                        <td class="my-1 px-4">Desain Grafis Percetakkan (Stiker dan Packaging)</td>
                        <td class="text-center"><button class="btn btn-warning my-1 text-black">Detail
                                Ujian</button></td>
                    </tr>
                    <tr>
                        <td class="my-1 px-4">Desain Grafis Percetakkan (Stiker dan Packaging)</td>
                        <td class="text-center"><button class="btn btn-warning my-1 text-black">Detail
                                Ujian</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- FORMULIR UMPAN BALIK --}}
        <div class="col-auto card-assesment my-5">
            <h5>Formulir Umpan Balik</h5>
            <p>Isi formulir umpan balik dengan menekan tombol di bawah, untuk memberi ulasan mengenai assesment </p>
            <button type="button" class="btn btn-primary tombol-primary-small">Umpan Balik</button>
        </div>
    </div>
@endsection
