@extends('layout.main-layout')
@section('main-section')
    <div class="container-fluid">
        {{-- JALUR FILE --}}
        <nav class="jalur-file mb-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                        href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                        href="{{ route('asesi.Assesment') }}">Assesment</a></li>
                <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Desain Grafis (Fotografi dan
                    Videografi) </li>
            </ol>
        </nav>
        <h5>Materi Uji Kompetensi Desain Grafis (Fotografi dan Videografi)</h5>
        <h3 class="mt-5" id="timer"></h3>
        <div class="row col gap-3 ms-1 mt-4">
            <div class="col-md-8 ">
                <div class="col-12 pernyataan">
                    <div class="col isi">
                        <h5>Pertanyaan Nomor 1</h5>
                        <p class="text-black fw-semibold">Photography,yang berasal dari kata “Photos” berarti cahaya dan
                            “Grafo”
                            berarti
                            melukis. Keduanya
                            berasal dari Bahasa…</p>
                        <div class="col row mt-4">
                            <div class="col-lg-6">
                                <div class="col-lg-12 mb-4">
                                    <input class="form-check-input" type="radio" name="jawaban1" id="soal1">
                                    <label class="form-check-label text-success" for="soal1">
                                        <span>A. Yunani</span>
                                    </label>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <input class="form-check-input" type="radio" name="jawaban1" id="soal2">
                                    <label class="form-check-label text-success" for="soal2">
                                        <span>B. Sansekerta</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12 mb-4">
                                    <input class="form-check-input" type="radio" name="jawaban1" id="soal3">
                                    <label class="form-check-label text-success" for="soal3">
                                        <span>C. Latin</span>
                                    </label>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <input class="form-check-input" type="radio" name="jawaban1" id="soal4">
                                    <label class="form-check-label text-success" for="soal4">
                                        <span>D. Inggris</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-auto nomor d-flex">
                <div class="col-md-12 row justify-content-center mt-4">
                    <div class="col-12 gap-3 row justify-content-center mt-4 ms-2">
                        <div class="col-md-auto bg-success text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-success text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-success text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-success text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-success text-white p-2 btn-number">01</div>
                    </div>
                    <div class="col-12 gap-3 row justify-content-center mt-4 ms-2">
                        <div class="col-md-auto bg-success text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                    </div>
                    <div class="col-12 gap-3 row justify-content-center mt-4 ms-2">
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                    </div>
                    <div class="col-12 gap-3 row justify-content-center mt-4 ms-2">
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">01</div>
                    </div>
                    <div class="col-12 row my-4 text-black gap-2" style="margin-left: 38px">
                        <div class="col-4 p-0 text-center mb-4"><span
                                class="bg-success text-success px-2 py-1 rounded-2 me-1">-</span>Terjawab</div>
                        <div class="col-6 p-0 text-center mb-4"><span
                                class="bg-secondary text-success px-2 py-1 rounded-2 me-1">-</span>Belum
                            Terjawab
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center" style="margin-left: 38px">
                        <button type="button" class="btn btn-primary tombol-primary-max mb-5">Selesai</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8 row gap-4 d-flex justify-content-end">
                <button type="button" class="btn btn-secondary tombol-tiernary-small col-6">
                    < Kembali</button>
                        <button type="button" class="btn btn-primary tombol-primary-small col-6">Selanjutnya ></button>
            </div>
        </div>
    </div>
@endsection
