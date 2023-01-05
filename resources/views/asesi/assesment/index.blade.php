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
            <button type="button" class="btn btn-primary tombol-primary-small" data-bs-toggle="modal"
                data-bs-target="#assesmentMandiri">Assesment Mandiri</button>
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
                        <td class="text-center"><button class="btn btn-warning my-1 text-black" data-bs-toggle="modal"
                                data-bs-target="#detailUjian">Detail
                                Ujian</button></td>
                    </tr>
                    <tr>
                        <td class="my-1 px-4">Desain Grafis Percetakkan (Stiker dan Packaging)</td>
                        <td class="text-center"><button class="btn btn-warning my-1 text-black" data-bs-toggle="modal"
                                data-bs-target="#detailUjian">Detail
                                Ujian</button></td>
                    </tr>
                    <tr>
                        <td class="my-1 px-4">Desain Grafis Percetakkan (Stiker dan Packaging)</td>
                        <td class="text-center"><button class="btn btn-warning my-1 text-black" data-bs-toggle="modal"
                                data-bs-target="#detailUjian">Detail
                                Ujian</button></td>
                    </tr>
                    <tr>
                        <td class="my-1 px-4">Desain Grafis Percetakkan (Stiker dan Packaging)</td>
                        <td class="text-center"><button class="btn btn-warning my-1 text-black" data-bs-toggle="modal"
                                data-bs-target="#detailUjian">Detail
                                Ujian</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- FORMULIR UMPAN BALIK --}}
        <div class="col-auto card-assesment my-5">
            <h5>Formulir Umpan Balik</h5>
            <p>Isi formulir umpan balik dengan menekan tombol di bawah, untuk memberi ulasan mengenai assesment </p>
            <button type="button" class="btn btn-primary tombol-primary-small" data-bs-toggle="modal"
                data-bs-target="#umpanBalik">Umpan Balik</button>
        </div>
    </div>

    {{-- MODAL ASSESMENT MANDIRI --}}
    <div class="modal fade" id="assesmentMandiri" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="assesmentMandiriLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="assesmentMandiriLabel">Formulir Asesmen Mandiri</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-black m-2">
                    <form action="">
                        @csrf

                        {{-- HEADER --}}
                        <div class="col">
                            <div class="assesment-mandiri-header">
                                <p class="assesment-mandiri-title">Judul Skema Sertifikasi</p>
                                <p>Skema Sertifikasi KKNI Level II Pada Kompetensi Keahlian Multimedia</p>
                            </div>
                            <div class="assesment-mandiri-header">
                                <p class="assesment-mandiri-title">Nomor Skema Sertifikasi</p>
                                <p>MM-06/LSP.SMKN1-STG/2020</p>
                            </div>
                            <div class="assesment-mandiri-header">
                                <p class="assesment-mandiri-title">Skema Sertifikasi</p>
                                <p>SKKNI No.115 Tahun 2007</p>
                            </div>
                        </div>
                        {{-- TITLE --}}
                        <div class="col">
                            <div class="row col unit-kompetensi">
                                <span>Unit Kompetensi</span><br>
                                <div class="col row fs-6">
                                    <div class="col-lg-auto unit-kode">TIK.MM01.007.01</div>
                                    <div class="col-lg-auto unit-isi">Memilih dan Memakai Software Dan Hardware Untuk
                                        Multimedia
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-4 fw-bold fs-6">Dapatkah Saya ?</div>
                        <div class="col mb-5">
                            <ol class="list-group list-group-numbered">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-start border-0 fw-semibold">
                                    <div class="ms-2 me-auto ">
                                        Elemen: Mengembangkan Pesyaratan Fungsi
                                        <div class="py-1">Kriteria Kerja:</div>
                                        {{-- KRITERIA KERJA --}}
                                        <div class="row col mx-3">
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.1</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi
                                                        yang akurat,
                                                        komplit
                                                        dan sesuai prioritas
                                                        diidentifikasi sesuai keperluan dengan referensi semua tipe media.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio" name="kompeten"
                                                            value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio" name="kompeten"
                                                            value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.2</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan yang berlawanan dan
                                                        overlapping diidentifikasi.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.3</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi didokumentasi dan
                                                        divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.4</div>
                                                    <div class="col-auto kriteria-isi">Sumber-sumber dan pembiayaan yang
                                                        tersedia diidentifikasi dan divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col mt-4">
                                            <div class="mb-3 fw-semibold fs-6">
                                                <label for="bukti" class="form-label">Bukti yang
                                                    relevan</label>
                                                <textarea class="form-control border-tiernary" id="bukti" rows="7" placeholder="Masukkan Bukti Disini"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-start border-0 fw-semibold">
                                    <div class="ms-2 me-auto ">
                                        Elemen: Mengembangkan Pesyaratan Fungsi
                                        <div class="py-1">Kriteria Kerja:</div>
                                        {{-- KRITERIA KERJA --}}
                                        <div class="row col mx-3">
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.1</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi
                                                        yang akurat,
                                                        komplit
                                                        dan sesuai prioritas
                                                        diidentifikasi sesuai keperluan dengan referensi semua tipe media.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.2</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan yang berlawanan dan
                                                        overlapping diidentifikasi.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.3</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi didokumentasi dan
                                                        divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.4</div>
                                                    <div class="col-auto kriteria-isi">Sumber-sumber dan pembiayaan yang
                                                        tersedia diidentifikasi dan divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col mt-4">
                                            <div class="mb-3 fw-semibold fs-6">
                                                <label for="bukti" class="form-label">Bukti yang
                                                    relevan</label>
                                                <textarea class="form-control border-tiernary" id="bukti" rows="7" placeholder="Masukkan Bukti Disini"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-start border-0 fw-semibold">
                                    <div class="ms-2 me-auto ">
                                        Elemen: Mengembangkan Pesyaratan Fungsi
                                        <div class="py-1">Kriteria Kerja:</div>
                                        {{-- KRITERIA KERJA --}}
                                        <div class="row col mx-3">
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.1</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi
                                                        yang akurat,
                                                        komplit
                                                        dan sesuai prioritas
                                                        diidentifikasi sesuai keperluan dengan referensi semua tipe media.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.2</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan yang berlawanan dan
                                                        overlapping diidentifikasi.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.3</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi didokumentasi dan
                                                        divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.4</div>
                                                    <div class="col-auto kriteria-isi">Sumber-sumber dan pembiayaan yang
                                                        tersedia diidentifikasi dan divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col mt-4">
                                            <div class="mb-3 fw-semibold fs-6">
                                                <label for="bukti" class="form-label">Bukti yang
                                                    relevan</label>
                                                <textarea class="form-control border-tiernary" id="bukti" rows="7" placeholder="Masukkan Bukti Disini"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div class="col">
                            <div class="row col unit-kompetensi">
                                <span>Unit Kompetensi</span><br>
                                <div class="col row fs-6">
                                    <div class="col-lg-auto unit-kode">TIK.MM01.007.01</div>
                                    <div class="col-lg-auto unit-isi">Memilih dan Memakai Software Dan Hardware Untuk
                                        Multimedia
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-4 fw-bold fs-6">Dapatkah Saya ?</div>
                        <div class="col mb-5">
                            <ol class="list-group list-group-numbered">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-start border-0 fw-semibold">
                                    <div class="ms-2 me-auto ">
                                        Elemen: Mengembangkan Pesyaratan Fungsi
                                        <div class="py-1">Kriteria Kerja:</div>
                                        {{-- KRITERIA KERJA --}}
                                        <div class="row col mx-3">
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.1</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi
                                                        yang akurat,
                                                        komplit
                                                        dan sesuai prioritas
                                                        diidentifikasi sesuai keperluan dengan referensi semua tipe media.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.2</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan yang berlawanan dan
                                                        overlapping diidentifikasi.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.3</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi didokumentasi dan
                                                        divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.4</div>
                                                    <div class="col-auto kriteria-isi">Sumber-sumber dan pembiayaan yang
                                                        tersedia diidentifikasi dan divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col mt-4">
                                            <div class="mb-3 fw-semibold fs-6">
                                                <label for="bukti" class="form-label">Bukti yang
                                                    relevan</label>
                                                <textarea class="form-control border-tiernary" id="bukti" rows="7" placeholder="Masukkan Bukti Disini"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-start border-0 fw-semibold">
                                    <div class="ms-2 me-auto ">
                                        Elemen: Mengembangkan Pesyaratan Fungsi
                                        <div class="py-1">Kriteria Kerja:</div>
                                        {{-- KRITERIA KERJA --}}
                                        <div class="row col mx-3">
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.1</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi
                                                        yang akurat,
                                                        komplit
                                                        dan sesuai prioritas
                                                        diidentifikasi sesuai keperluan dengan referensi semua tipe media.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.2</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan yang berlawanan dan
                                                        overlapping diidentifikasi.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.3</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi didokumentasi dan
                                                        divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.4</div>
                                                    <div class="col-auto kriteria-isi">Sumber-sumber dan pembiayaan yang
                                                        tersedia diidentifikasi dan divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col mt-4">
                                            <div class="mb-3 fw-semibold fs-6">
                                                <label for="bukti" class="form-label">Bukti yang
                                                    relevan</label>
                                                <textarea class="form-control border-tiernary" id="bukti" rows="7" placeholder="Masukkan Bukti Disini"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-start border-0 fw-semibold">
                                    <div class="ms-2 me-auto ">
                                        Elemen: Mengembangkan Pesyaratan Fungsi
                                        <div class="py-1">Kriteria Kerja:</div>
                                        {{-- KRITERIA KERJA --}}
                                        <div class="row col mx-3">
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.1</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi
                                                        yang akurat,
                                                        komplit
                                                        dan sesuai prioritas
                                                        diidentifikasi sesuai keperluan dengan referensi semua tipe media.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.2</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan yang berlawanan dan
                                                        overlapping diidentifikasi.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.3</div>
                                                    <div class="col-auto kriteria-isi">Persyaratan fungsi didokumentasi dan
                                                        divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto kriteria-nomor">1.4</div>
                                                    <div class="col-auto kriteria-isi">Sumber-sumber dan pembiayaan yang
                                                        tersedia diidentifikasi dan divalidasi oleh klien.
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="kompeten">
                                                        <label class="form-check-label text-success"
                                                            for="kompeten">Kompeten</label>
                                                    </div>
                                                    <div class="col-auto kriteria-kompeten">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="kompeten" value="" id="belumKompeten">
                                                        <label class="form-check-label text-danger"
                                                            for="belumKompeten">Belum
                                                            Kompeten</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col mt-4">
                                            <div class="mb-3 fw-semibold fs-6">
                                                <label for="bukti" class="form-label">Bukti yang
                                                    relevan</label>
                                                <textarea class="form-control border-tiernary" id="bukti" rows="7" placeholder="Masukkan Bukti Disini"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        {{-- TITLE --}}
                        <div class="col profil-section">
                            <div class="profil-section-title mb-5">
                                Ditinjau oleh Asesor
                            </div>
                            <div class="row col">
                                <div class="col-lg-6">
                                    <h5>Mengetahui Asesi</h5>
                                    <div class="col edit-profil-left">
                                        <label for="namaAsesi" class="form-label fw-semibold">Nama Asesi</label>
                                        <input type="text" id="namaAsesi" class="form-control input-text"
                                            placeholder="Masukkan Nama Asesi">
                                    </div>
                                    <div class="col edit-profil-left">
                                        <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                                        <input type="date" id="tanggal" class="form-control input-text">
                                    </div>
                                    {{-- TANDA TANGAN / TTD --}}
                                    <label for="signature-pad" class="form-label fw-semibold">Tanda Tangan</label>
                                    <div class="col edit-profil mb-4 signature-pad" id="signature-pad">
                                        <canvas></canvas>
                                    </div>
                                    {{-- <div id="signature-clear">
                                            <button type="button" class="button button-primary tombol-primary-small mb-4"
                                                data-action="clear">Clear</button>
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary tombol-primary-small">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DETAIL UJIAN --}}
    <div class="modal fade" id="detailUjian" tabindex="-1" aria-labelledby="detailUjianLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailUjianLabel">Desain Grafis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row col justify-content-center d-flex text-black fw-semibold">
                        <div class="col-11 my-1">Sesi : 1</div>
                        <div class="col-11 my-1">Jenis Tes : Tertulis</div>
                        <div class="col-11 my-1">Nama Asesor : Rika Eka Kembara, S.Kom</div>
                        <div class="col-11 my-1">Ujian dibuka pada Selasa, 08 Februari 2022, Pukul 07:00</div>
                        <div class="col-11 my-1">TUK : Lab MULTIMEDIA</div>
                        <div class="col-11 my-1">Waktu Pengerjaan: 120 Menit</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary tombol-primary-max">Mulai Ujian</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL UMPAN BALIK --}}
    <div class="modal fade" id="umpanBalik" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-labelledby="umpanBalikLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="umpanBalikLabel">Formulir Umpan Balik</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col p-4">
                        {{-- HEADER --}}
                        <div class="row col text-black">
                            <div class="col-lg-3">
                                <h6>Nama Asesi</h6>
                                <div class="mb-4">Muhammad Agung</div>
                                <h6>Nama Asesor</h6>
                                <div class="mb-5">Wawan Sukmawadi, S.Pd.,</div>
                            </div>
                            <div class="col-lg-3 text-black">
                                <h6>Hari dan Tanggal</h6>
                                <div class="mb-4">Senin, 25-12-2022</div>
                                <h6>Waktu</h6>
                                <div class="mb-5">09:00</div>
                            </div>
                            <div class="fst-italic my-2">Umpan balik dari Asesi (diisi oleh Asesi setelah pengambilan
                                keputusan) :
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <h5>Komponen</h5>
                                    </th>
                                    <th scope="col">
                                        <h5>Hasil</h5>
                                    </th>
                                    <th scope="col">
                                        <h5>Catatan / Komentar Asesi</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Saya mendapatkan penjelasan yang cukup memadai mengenai proses asesmen/uji
                                        kompetensi</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary tombol-primary-small">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
