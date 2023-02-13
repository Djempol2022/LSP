@extends('layout.main-layout', ['title'=>"Buat Soal"])
@section('main-section')

<div class="container mt-5 jalur-file" id="profile-section">
    {{-- JALUR FOLDER --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                    href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Profil</li>
        </ol>
    </nav>

    <div class="mt-5">

        <div class="mb-5" style="margin-bottom: 0rem !important;">
            <div class="col profil-section-title">
                Jadwal Uji Kompetensi
            </div>


            {{-- JADWAL UJI KOMPETENSI --}}
            <div class="col profil-section" style="margin-bottom: 0% !important">
                <h5>A. Data Pribadi</h5>
                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="col pb-4">
                            <p class="fw-bold">Jurusan</p>
                            <span>{{ $data_jurusan->jurusan }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Materi Uji Kompetensi</p>
                            <span>{{ $data_muk->muk }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Jenis Soal</p>
                            <span>{{ $data_jenis_soal->jenis_soal }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- DAFTAR UNIT KOMPETENSI --}}
        <div>
            <div class="col profil-section-title">
                Soal {{ $data_jenis_soal->jenis_soal }}
            </div>
            <section class="section">
                <div class="card">
                    @if($data_jenis_soal->id == "1")
                        <form action="{{ route('asesor.TambahSoalPilihanGanda') }}" method="POST">
                            @csrf
                            <div class="card-body">

                                <input type="hidden" name="jadwal_uji_kompetensi_id" value="{{ $jadwal_id->id }}" hidden>
                                <input type="hidden" name="jenis_tes" value="{{ $data_jenis_soal->id }}" hidden>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="card-title">Pertanyaan 1</h4>
                                        <div class="form-group shadow-textarea">
                                            <label for="basicInput">Pertanyaan/Soal</label>
                                            <textarea type="text" cols="30" rows="5" name="pertanyaan[0]"
                                                id="pertanyaan[0]" class="form-control input-text rounded-3"
                                                placeholder="Masukkan Soal/Pertanyaan" style="outline: none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="row" id="pilihan-0">
                                        <label for="basicInput">Pilihan</label>
                                        <div class="col-lg-3 mb-1">
                                            <div class="input-group mb-3 shadow-textarea">
                                                <span class="input-group-text">a</span>
                                                <textarea type="text" name="pilihan[0][0]"
                                                    class="form-control input-text rounded-3" placeholder="Addon to left"
                                                    aria-label="Username" aria-describedby="basic-addon1"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="input-group mb-3 shadow-textarea">
                                                <span class="input-group-text">b</span>
                                                <textarea type="text" name="pilihan[0][1]"
                                                    class="form-control input-text rounded-3" placeholder="Addon to left"
                                                    aria-label="Username" aria-describedby="basic-addon1"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="input-group mb-3 shadow-textarea">
                                                <span class="input-group-text">c</span>
                                                <textarea type="text" name="pilihan[0][2]"
                                                    class="form-control input-text rounded-3" placeholder="Addon to left"
                                                    aria-label="Username" aria-describedby="basic-addon1"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="input-group mb-3 shadow-textarea">
                                                <span class="input-group-text">d</span>
                                                <textarea type="text" name="pilihan[0][3]"
                                                    class="form-control input-text rounded-3" placeholder="Addon to left"
                                                    aria-label="Username" aria-describedby="basic-addon1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="basicInput">Jawaban</label>
                                        <div class="form-group shadow-textarea">
                                            <select class="choices form-select input-text" name="jawaban[0]"
                                                id="jawaban[0]">
                                                <option selected disabled>Pilih Jawaban</option>
                                                <option value="1">a</option>
                                                <option value="2">b</option>
                                                <option value="3">c</option>
                                                <option value="4">d</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary btn-block btn-sm ml-1"
                                        onclick="addQuestion()">+ Tambah Pertanyaan</button>
                                </div>

                                <div id="divPertanyaanPilihanGanda"></div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                    @elseif($data_jenis_soal->id=="2")
                        <form action="{{ route('asesor.TambahSoalEssay') }}" method="POST">
                            @csrf
                            <div class="card-body">

                                <input type="hidden" name="jadwal_uji_kompetensi_id" value="{{ $jadwal_id->id }}" hidden>
                                <input type="hidden" name="jenis_tes" value="{{ $data_jenis_soal->id }}" hidden>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="card-title">Pertanyaan 1</h4>
                                        <div class="form-group">
                                            <label for="basicInput">Pertanyaan/Soal</label>
                                            <textarea type="text" cols="30" rows="5" name="essay_pertanyaan[0]"
                                                id="pertanyaan[0]" class="form-control input-text rounded-3"
                                                placeholder="Masukkan Soal/Pertanyaan"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="basicInput">Jawaban</label>
                                        <div class="form-group">
                                            <textarea type="text" cols="30" rows="5" name="essay_jawaban[0]" id="essay_jawaban[0]"
                                                class="form-control input-text rounded-3"
                                                placeholder="Masukkan Soal/Pertanyaan"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary btn-block btn-sm ml-1"
                                        onclick="addQuestion()">+ Tambah Pertanyaan</button>
                                </div>

                                <div id="divPertanyaanEssay"></div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                    @elseif($data_jenis_soal->id=="3")
                    <form action="{{ route('asesor.TambahSoalWawancara') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <input type="text" name="jadwal_uji_kompetensi_id" value="{{ $jadwal_id->id }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="card-title">Pertanyaan 1</h4>
                                    <div class="form-group">
                                        <label for="basicInput">Pertanyaan/Soal</label>
                                        <textarea type="text" cols="30" rows="5" name="wawancara_pertanyaan[0]"
                                            id="pertanyaan[0]" class="form-control input-text"
                                            placeholder="Masukkan Soal/Pertanyaan"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="basicInput">Jawaban</label>
                                    <div class="form-group">
                                        <textarea type="text" cols="30" rows="5" name="wawancara_jawaban[0]" id="wawancara_jawaban[0]"
                                            class="form-control input-text"
                                            placeholder="Masukkan Soal/Pertanyaan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary btn-block btn-sm ml-1"
                                    onclick="addQuestion()">+ Tambah Pertanyaan</button>
                            </div>

                            <div id="divPertanyaanWawancara"></div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                    @endif

                    {{-- <div class="container">
                        <form action="/quiz" method="POST" class="form">
                            <div class="col-12" id="divQuestion">

                                <div class="row">
                                    <div class="col-8">
                                        <label for="">Question</label>
                                        <textarea class="form-control" name="pertanyaan[0]" id="pertanyaan[0]" cols="30" rows="5" placeholder="Input question here..." required></textarea>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-block btn-sm ml-1" onclick="addQuestion()">Add Another Question</button>
                                        </div>
                                    </div>
                                    <div class="choice" id="mc-0">
                                        <div class="col-12" style="padding-top: 10px;">
                                            <div class="row">
                                                <div class="col-3"><label>Choice 1</label><input name="mc[0][0]" type="text" class="form-control"></div>
                                                <div class="col-3"><label>Choice 2</label><input name="mc[0][1]" type="text" class="form-control"></div>
                                                <div class="col-3"><label>Choice 3</label><input name="mc[0][2]" type="text" class="form-control"></div>
                                                <div class="col-3"><label>Choice 4</label><input name="mc[0][3]" type="text" class="form-control"></div>
                                            </div>
                                            <div class="row" style="padding-top: 10px;">
                                                <div class="col-8">
                                                    <label for="">Correct choice</label>
                                                    <select name="c-mc[0]" id="c-mc[0]" class="form-control">
                                                        <option value="1">Choice 1</option>
                                                        <option value="2">Choice 2</option>
                                                        <option value="3">Choice 3</option>
                                                        <option value="4">Choice 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div> --}}


                </div>
            </section>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
    var newId = 1;
    var pilihan_ganda = jQuery.validator.format(`
    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title">Pertanyaan {0}</h4>
            <div class="form-group">
                <button class="btn btn-danger btn-sm hapusPertanyaanPilihanGanda">X</button>
                <label for="basicInput">Pertanyaan/Soal</label>
                <textarea type="text" cols="30" rows="5" name="pertanyaan[{0}]" id="" class="form-control input-text rounded-3" id="basicInput"
                    placeholder="Masukkan Soal/Pertanyaan"></textarea>
            </div>
        </div>
        <div class="row" id="pilihan-{0}">
            <label for="basicInput">Pilihan</label>
            <div class="col-lg-3 mb-1">
                <div class="input-group mb-3">
                    <span class="input-group-text">a</span>
                    <textarea type="text" name="pilihan[{0}][0]" class="form-control input-text rounded-3" placeholder="Addon to left"
                        aria-label="Username" aria-describedby="basic-addon1"></textarea>
                </div>
            </div>
            <div class="col-lg-3 mb-1">
                <div class="input-group mb-3">
                    <span class="input-group-text">b</span>
                    <textarea type="text" name="pilihan[{0}][1]" class="form-control input-text rounded-3" placeholder="Addon to left"
                        aria-label="Username" aria-describedby="basic-addon1"></textarea>
                </div>
            </div>
            <div class="col-lg-3 mb-1">
                <div class="input-group mb-3">
                    <span class="input-group-text">c</span>
                    <textarea type="text" name="pilihan[{0}][2]" class="form-control input-text rounded-3" placeholder="Addon to left"
                        aria-label="Username" aria-describedby="basic-addon1"></textarea>
                </div>
            </div>
            <div class="col-lg-3 mb-1">
                <div class="input-group mb-3">
                    <span class="input-group-text">d</span>
                    <textarea type="text" name="pilihan[{0}][3]" class="form-control input-text rounded-3" placeholder="Addon to left"
                        aria-label="Username" aria-describedby="basic-addon1"></textarea>
                </div>
            </div>
        </div>
    <div class="col-md-12">
        <label for="basicInput">Jawaban</label>
        <div class="form-group">
            <select class="choices form-select input-text rounded-3" id="jawaban[{0}]" name="jawaban[{0}]">
                <option selected disabled>Pilih Jawaban</option>
                <option value="1">a</option>
                <option value="2">b</option>
                <option value="3">c</option>
                <option value="4">d</option>
            </select>
        </div>
    </div>
    <hr>
    </div>
`);

    var essay = jQuery.validator.format(`
    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title">Pertanyaan {0}</h4>
            <div class="form-group">
                <button class="btn btn-danger btn-sm hapusPertanyaanEssay">X</button>
                <label for="basicInput">Pertanyaan/Soal</label>
                <textarea type="text" cols="30" rows="5" name="essay_pertanyaan[{0}]" id="" class="form-control input-text rounded-3" id="basicInput"
                    placeholder="Masukkan Soal/Pertanyaan"></textarea>
            </div>
        </div>
    <div class="col-md-12">
        <label for="basicInput">Jawaban</label>
        <div class="form-group">
            <div class="form-group">
                <textarea type="text" cols="30" rows="5" name="essay_jawaban[{0}]" id="essay_jawaban[{0}]"
                    class="form-control input-text rounded-3"
                    placeholder="Masukkan Soal/Pertanyaan"></textarea>
                </div>
        </div>
    </div>
    <hr>
    </div>
`);

var wawancara = jQuery.validator.format(`
    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title">Pertanyaan {0}</h4>
            <div class="form-group">
                <button class="btn btn-danger btn-sm hapusPertanyaanWawancara">X</button>
                <label for="basicInput">Pertanyaan/Soal</label>
                <textarea type="text" cols="30" rows="5" name="wawancara_pertanyaan[{0}]" id="" class="form-control input-text rounded-3" id="basicInput"
                    placeholder="Masukkan Soal/Pertanyaan"></textarea>
            </div>
        </div>
    <div class="col-md-12">
        <label for="basicInput">Jawaban</label>
        <div class="form-group">
            <div class="form-group">
                <textarea type="text" cols="30" rows="5" name="wawancara_jawaban[{0}]" id="wawancara_jawaban[{0}]"
                    class="form-control input-text rounded-3"
                    placeholder="Masukkan Soal/Pertanyaan"></textarea>
                </div>
        </div>
    </div>
    <hr>
    </div>
`);

    $('#divPertanyaanPilihanGanda').on('click', '.hapusPertanyaanPilihanGanda', function (e) {
        e.preventDefault();
        newId--;
        $(this).parent().parent().parent().remove();
    });

    $('#divPertanyaanEssay').on('click', '.hapusPertanyaanEssay', function (e) {
        e.preventDefault();
        newId--;
        $(this).parent().parent().parent().remove();
    });

    $('#divPertanyaanWawancara').on('click', '.hapusPertanyaanWawancara', function (e) {
        e.preventDefault();
        newId--;
        $(this).parent().parent().parent().remove();
    });

    function addQuestion() {
        $('#divPertanyaanEssay').append(essay(newId));
        $('#divPertanyaanWawancara').append(wawancara(newId));
        $('#divPertanyaanPilihanGanda').append(pilihan_ganda(newId));
        newId++;
    }

</script>
@endsection
