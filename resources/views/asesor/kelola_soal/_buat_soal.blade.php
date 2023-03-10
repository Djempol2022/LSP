@extends('layout.main-layout', ['title'=>"Buat Soal"])
@section('main-section')

<div class="container mt-5 jalur-file" id="profile-section">
    {{-- JALUR FOLDER --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                    href="{{ route('asesor.KelolaSoal') }}">Kelola Soal</a></li>
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                    href="{{ route('asesor.KelolaSoal.PilihJenisSoal', $jadwal_id->id) }}">Jenis Soal</a></li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Buat Soal</li>
        </ol>
    </nav>

    <div class="mt-5">

        <div class="mb-5" style="margin-bottom: 0rem !important;">
            <div class="col profil-section-title">
                Rencana Pembuatan Soal
            </div>


            {{-- JADWAL UJI KOMPETENSI --}}
            <div class="col profil-section" style="margin-bottom: 0% !important">
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
                    @if($data_jenis_soal->id == "1")
                        <form action="{{ route('asesor.TambahSoalPilihanGanda') }}" method="POST" id="form-TambahSoalPilihanGanda">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="jadwal_uji_kompetensi_id" value="{{ $jadwal_id->id }}" hidden>
                                <input type="hidden" name="jenis_tes" value="{{ $data_jenis_soal->id }}" hidden>
                                <div class="row">
                                    <div class="card p-4">
                                        <div class="col-md-12">
                                            <h4 class="card-title">Pertanyaan 1</h4>
                                            <div class="form-group shadow-textarea">
                                                <textarea type="text" cols="30" rows="5" name="pertanyaan[0]"
                                                    id="pertanyaan[0]" class="form-control rounded-3"
                                                    placeholder="Masukkan Soal/Pertanyaan" style="outline: none;" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row" id="pilihan-0">
                                            <label for="basicInput">Pilihan</label>
                                            <div class="col-lg-3 mb-1">
                                                <div class="input-group mb-3 shadow-textarea">
                                                    <span class="input-group-text">a</span>
                                                    <textarea type="text" name="pilihan[0][0]"
                                                        class="form-control rounded-3" placeholder="Teks Pilihan A"
                                                        aria-label="Username" aria-describedby="basic-addon1" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mb-1">
                                                <div class="input-group mb-3 shadow-textarea">
                                                    <span class="input-group-text">b</span>
                                                    <textarea type="text" name="pilihan[0][1]"
                                                        class="form-control rounded-3" placeholder="Teks Pilihan B"
                                                        aria-label="Username" aria-describedby="basic-addon1"required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mb-1">
                                                <div class="input-group mb-3 shadow-textarea">
                                                    <span class="input-group-text">c</span>
                                                    <textarea type="text" name="pilihan[0][2]"
                                                        class="form-control rounded-3" placeholder="Teks Pilihan C"
                                                        aria-label="Username" aria-describedby="basic-addon1"required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mb-1">
                                                <div class="input-group mb-3 shadow-textarea">
                                                    <span class="input-group-text">d</span>
                                                    <textarea type="text" name="pilihan[0][3]"
                                                        class="form-control rounded-3" placeholder="Teks Pilihan D"
                                                        aria-label="Username" aria-describedby="basic-addon1"required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="basicInput">Jawaban</label>
                                            <div class="form-group shadow-textarea">
                                                <select class="choices form-select" name="jawaban[0]"
                                                    id="jawaban[0]" required="required">
                                                    <option value="" selected disabled>Pilih Jawaban</option>
                                                    <option value="1">a</option>
                                                    <option value="2">b</option>
                                                    <option value="3">c</option>
                                                    <option value="4">d</option></select>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div id="divPertanyaanPilihanGanda"></div>

                                    <div class="form-group d-flex justify-content-center">
                                        <button type="button" class="btn btn-success rounded-3 btn-sm ml-1"
                                            onclick="addQuestion()"><i class="fa fa-plus"></i>
                                        </button>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-md-4">
                                                <label for="signature-pad" class="form-label fw-semibold">Tanda Tangan</label>
                                                <div class="col edit-profil signature-pad" id="signature-pad">
                                                <canvas id="sig"></canvas>
                                                <input type="hidden" name="ttd_asesor" value="" id="ttd" hidden>
                                                </div>
                                                <div class="col" id="signature-clear">
                                                    <button type="button" class="btn-sm btn btn-danger"
                                                        id="clear"><i class="fa fa-eraser"></i>
                                                    </button>
                                                </div>
                                                <div class="input-group has-validation">
                                                        <label class="text-danger error-text ttd_asesor_error"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button id="simpan" type="submit" class="btn btn-primary rounded-4 btn-block">
                                            <i id="icon-button-simpan-pilihan-ganda"></i>
                                            <span id="text-simpan-pilihan-ganda" class="d-none d-sm-block">Simpan</span>
                                        </button>

                                        {{-- <button type="submit" id="simpan" class="btn btn-primary rounded-4 btn-block">Submit</button> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    @elseif($data_jenis_soal->id=="2")
                        <form action="{{ route('asesor.TambahSoalEssay') }}" method="POST" id="form-TambahSoalEssay">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="jadwal_uji_kompetensi_id" value="{{ $jadwal_id->id }}" hidden>
                                <input type="hidden" name="jenis_tes" value="{{ $data_jenis_soal->id }}" hidden>
                                <div class="row">
                                    <div class="card p-4">
                                        <div class="col-md-12">
                                            <h4 class="card-title">Pertanyaan 1</h4>
                                            <div class="form-group shadow-textarea">
                                                <textarea cols="30" rows="5" name="essay_pertanyaan[0]"
                                                    id="pertanyaan[0]" class="form-control rounded-3"
                                                    placeholder="Masukkan Soal/Pertanyaan" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="basicInput">Jawaban</label>
                                            <div class="form-group">
                                                <textarea cols="30" rows="5" name="essay_jawaban[0]" id="essay_jawaban[0]"
                                                    class="form-control rounded-3"
                                                    placeholder="Masukkan Soal/Pertanyaan" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="divPertanyaanEssay"></div>

                                    <div class="form-group d-flex justify-content-center">
                                        <button type="button" class="btn btn-success rounded-3 btn-sm ml-1"
                                            onclick="addQuestion()"><i class="fa fa-plus"></i>
                                        </button>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-md-4 pb-4">
                                                <label for="signature-pad" class="form-label fw-semibold">Tanda Tangan</label>
                                                <div class="col edit-profil mb-2 signature-pad" id="signature-pad">
                                                <canvas id="sig"></canvas>
                                                <input type="hidden" name="ttd_asesor" value="" id="ttd" hidden>
                                                </div>
                                                <div class="col" id="signature-clear">
                                                    <button type="button" class="btn-sm btn btn-danger mb-2"
                                                        id="clear"><i class="fa fa-eraser"></i>
                                                    </button>
                                                </div>
                                                <div class="input-group has-validation">
                                                        <label class="text-danger error-text ttd_asesor_error"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button id="simpan" type="submit" class="btn btn-primary rounded-4 btn-block">
                                            <i id="icon-button-simpan-essay"></i>
                                            <span id="text-simpan-essay" class="d-none d-sm-block">Simpan</span>
                                        </button>
                                        {{-- <button type="submit" id="simpan" class="btn rounded-3 btn-primary btn-block">Submit</button> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    @elseif($data_jenis_soal->id=="3")
                        <form action="{{ route('asesor.TambahSoalWawancara') }}" method="POST" id="form-TambahWawancara">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="jadwal_uji_kompetensi_id" value="{{ $jadwal_id->id }}" hidden>
                                <div class="row">
                                    <div class="card p-4">
                                        <div class="col-md-12">
                                            <h4 class="card-title">Pertanyaan 1</h4>
                                            <div class="form-group">
                                                <textarea cols="30" rows="5" name="wawancara_pertanyaan[0]"
                                                    id="pertanyaan[0]" class="form-control"
                                                    placeholder="Masukkan Soal/Pertanyaan" required></textarea>
                                            </div>
                                        </div>
                                    {{-- <div class="col-md-12">
                                        <label for="basicInput">Jawaban</label>
                                        <div class="form-group">
                                            <textarea cols="30" rows="5" name="wawancara_jawaban[0]" id="wawancara_jawaban[0]"
                                                class="form-control"
                                                placeholder="Masukkan Soal/Pertanyaan"></textarea>
                                        </div>
                                    </div> --}}
                                    </div>

                                    <div id="divPertanyaanWawancara"></div>


                                    <div class="form-group d-flex justify-content-center">
                                        <button type="button" class="btn btn-success rounded-3 btn-sm ml-1"
                                            onclick="addQuestion()"><i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                            
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-md-4 pb-4">
                                                <label for="signature-pad" class="form-label fw-semibold">Tanda Tangan</label>
                                                <div class="col edit-profil mb-2 signature-pad" id="signature-pad">
                                                    <canvas id="sig"></canvas>
                                                    <input type="hidden" name="ttd_asesor" value="" id="ttd" hidden>
                                                </div>
                                                <div class="col" id="signature-clear">
                                                    <button type="button" class="btn-sm btn btn-danger mb-2"
                                                        id="clear"><i class="fa fa-eraser"></i>
                                                    </button>
                                                </div>
                                                <div class="input-group has-validation">
                                                    <label class="text-danger error-text ttd_asesor_error"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-12">
                                    <button id="simpan" type="submit" class="btn btn-primary rounded-4 btn-block">
                                        <i id="icon-button-simpan-wawancara"></i>
                                        <span id="text-simpan-wawancara" class="d-none d-sm-block">Simpan</span>
                                    </button>
                                    {{-- <button type="submit" id="simpan" class="btn btn-primary btn-block">Submit</button> --}}
                                </div>
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
                                <button type="submit" id="simpan" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div> --}}
            </section>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
    var newId = 1;
    var nomor = 2;

    var pilihan_ganda = jQuery.validator.format(`
    <div class="row">
        <div class="card p-4">
        <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-danger btn-sm hapusPertanyaanPilihanGanda">x</button>
                <label class="card-title" for="basicInput">Pertanyaan {1} </label>
                <textarea cols="30" rows="5" name="pertanyaan[{0}]" id="" class="form-control rounded-3" id="basicInput"
                    placeholder="Masukkan Soal/Pertanyaan" required></textarea>
                
            </div>
        </div>
        <div class="row" id="pilihan-{0}">
            <label for="basicInput">Pilihan</label>
            <div class="col-lg-3 mb-1">
                <div class="input-group mb-3">
                    <span class="input-group-text">a</span>
                    <textarea name="pilihan[{0}][0]" class="form-control rounded-3" placeholder="Teks Pilihan A"
                        aria-label="Username" aria-describedby="basic-addon1" required></textarea>
                </div>
            </div>
            <div class="col-lg-3 mb-1">
                <div class="input-group mb-3">
                    <span class="input-group-text">b</span>
                    <textarea name="pilihan[{0}][1]" class="form-control rounded-3" placeholder="Teks Pilihan B"
                        aria-label="Username" aria-describedby="basic-addon1" required></textarea>
                </div>
            </div>
            <div class="col-lg-3 mb-1">
                <div class="input-group mb-3">
                    <span class="input-group-text">c</span>
                    <textarea name="pilihan[{0}][2]" class="form-control rounded-3" placeholder="Teks Pilihan C"
                        aria-label="Username" aria-describedby="basic-addon1" required></textarea>
                </div>
            </div>
            <div class="col-lg-3 mb-1">
                <div class="input-group mb-3">
                    <span class="input-group-text">d</span>
                    <textarea name="pilihan[{0}][3]" class="form-control rounded-3" placeholder="Teks Pilihan D"
                        aria-label="Username" aria-describedby="basic-addon1" required></textarea>
                </div>
            </div>
        </div>
    <div class="col-md-6 mb-4">
        <label for="basicInput">Jawaban</label>
        <div class="form-group">
            <select class="choices form-select rounded-3" id="jawaban[{0}]" name="jawaban[{0}]" required>
                <option value=""selected disabled>Pilih Jawaban</option>
                <option value="1">a</option>
                <option value="2">b</option>
                <option value="3">c</option>
                <option value="4">d</option>
            </select>
        </div>
    </div>
    </div>
    </div>
`);

    var essay = jQuery.validator.format(`
    <div class="row">
        <div class="card p-4">
        <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-danger btn-sm hapusPertanyaanEssay">x</button>
                <label class="card-title" for="basicInput">Pertanyaan {1} </label>
                <textarea type="text" cols="30" rows="5" name="essay_pertanyaan[{0}]" id="" class="form-control rounded-3" id="basicInput"
                    placeholder="Masukkan Soal/Pertanyaan" required></textarea>
            </div>
        </div>
    <div class="col-md-12">
        <label for="basicInput">Jawaban</label>
        <div class="form-group">
            <div class="form-group">
                <textarea type="text" cols="30" rows="5" name="essay_jawaban[{0}]" id="essay_jawaban[{0}]"
                    class="form-control rounded-3"
                    placeholder="Masukkan Soal/Pertanyaan" required></textarea>
                </div>
        </div>
    </div>
    </div>
    </div>
`);

// jQuery("#pilihan_ganda").validate({
//     rules: {
//     'pertanyaan[0]':{
//         required:true
//     },
//     'pilihan[0]':{
//         required:true
//     },
//     'jawaban[0]':{
//         required:true
//     }},
//     messages: {
//             'pertanyaan[0]':{
//                 required:"floor is required."
//             },
//             'pilihan[0]':{
//                 required:"floor is required."
//             },
//             'jawaban[0]':{
//                 required:"floor is required."
//             }
//         }
//     });

var wawancara = jQuery.validator.format(`
    <div class="row">
        <div class="card p-4">
        <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-danger btn-sm hapusPertanyaanWawancara">X</button>
                <label class="card-title" for="basicInput">Pertanyaan {1} </label>
                <textarea type="text" cols="30" rows="5" name="wawancara_pertanyaan[{0}]" id="" class="form-control rounded-3" id="basicInput"
                    placeholder="Masukkan Soal/Pertanyaan" required></textarea>
            </div>
        </div>
    </div>
    </div>
`);

    $('#divPertanyaanPilihanGanda').on('click', '.hapusPertanyaanPilihanGanda', function (e) {
        e.preventDefault();
        newId--;
        nomor--;
        $(this).parent().parent().parent().remove();
    });

    $('#divPertanyaanEssay').on('click', '.hapusPertanyaanEssay', function (e) {
        e.preventDefault();
        newId--;
        nomor--;
        $(this).parent().parent().parent().remove();
    });

    $('#divPertanyaanWawancara').on('click', '.hapusPertanyaanWawancara', function (e) {
        e.preventDefault();
        newId--;
        nomor--;
        $(this).parent().parent().parent().remove();
    });

    function addQuestion() {
        $('#divPertanyaanEssay').append(essay(newId, nomor));
        $('#divPertanyaanWawancara').append(wawancara(newId, nomor));
        $('#divPertanyaanPilihanGanda').append(pilihan_ganda(newId, nomor));
        newId++;
        nomor++;
    }

    //   TTD
    let canvas;
    let signaturePad;

    function setupSignatureBox() {
      canvas = document.getElementById('sig');
      signaturePad = new SignaturePad(canvas);

      var ratio = Math.max(window.devicePixelRatio || 1, 1);

      canvas.width = canvas.offsetWidth * ratio;
      canvas.height = canvas.offsetHeight * ratio;
      var w = window.innerWidth;
      if (canvas.width == 0 && canvas.height == 0) {
        if (w > 1200) {
          canvas.width = 496 * ratio;
          canvas.height = 200 * ratio;
        } else if (w < 1200 && w > 992) {
          canvas.width = 334 * ratio;
          canvas.height = 200 * ratio;
        } else if (w < 992) {
          canvas.width = 399 * ratio;
          canvas.height = 200 * ratio;
        }
      } else {
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
      }
      canvas.getContext("2d").scale(ratio, ratio);
      signaturePad.clear();
    }

    function clear() {
      signaturePad.clear();
    }

    function sentToController() {
        if (signaturePad.isEmpty()) {
            let ttdData = "";
            document.getElementById('ttd').value = ttdData;
        } else {
            let ttdData = signaturePad.toDataURL();
            document.getElementById('ttd').value = ttdData;
        }
    }

    $('#form-TambahWawancara').on('submit', function(e) {
        e.preventDefault();
        $("#simpan").attr('disabled','disabled');
        var search = $("#icon-button-simpan-wawancara")

        search.addClass("fa fa-spinner fa-spin")
        $("#text-simpan-wawancara").html('')

        $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: new FormData(this),
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend: function() {
            $(document).find('label.error-text').text('');
          },
          success: function(data) {
            if (data.status == 0) {
                $.each(data.error, function(prefix, val) {
                $('label.' + prefix + '_error').text(val[0]);
                // $('span.'+prefix+'_error').text(val[0]);
                });
                $("#simpan").removeAttr('disabled')
                search.removeClass("fa fa-spinner fa-spin")
                $("#text-simpan-wawancara").html('<span id="text-simpan-wawancara" class="d-none d-sm-block">Simpan</span>')
            } 
            else if (data.status == 1) {
                search.removeClass("fa fa-spinner fa-spin")
                $("#text-simpan-wawancara").html('<span id="text-simpan-wawancara" class="d-none d-sm-block">Simpan</span>')
                setTimeout(function() {
                    // $("#simpan").removeAttr('disabled')
                    window.location.href = "/asesor/review-soal/"+data.jadwal_id+"/"+data.jenis_tes;
                },2000);
                swal({
                        title: "Berhasil",
                        text: `${data.msg}`,
                        icon: "success",
                        successMode: true,
                });
            }
          }
        });
    });

    $('#form-TambahSoalEssay').on('submit', function(e) {
        e.preventDefault();
        $("#simpan").attr('disabled','disabled');
        var search = $("#icon-button-simpan-essay")

        search.addClass("fa fa-spinner fa-spin")
        $("#text-simpan-essay").html('')

        $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: new FormData(this),
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend: function() {
            $(document).find('label.error-text').text('');
          },
          success: function(data) {
                if (data.status == 0) {
                $.each(data.error, function(prefix, val) {
                    $('label.' + prefix + '_error').text(val[0]);
                    // $('span.'+prefix+'_error').text(val[0]);
                });
                $("#simpan").removeAttr('disabled')
                search.removeClass("fa fa-spinner fa-spin")
                $("#text-simpan-essay").html('<span id="text-simpan-essay" class="d-none d-sm-block">Simpan</span>')
                    
            } 
            else if (data.status == 1) {
                search.removeClass("fa fa-spinner fa-spin")
                $("#text-simpan-essay").html('<span id="text-simpan-essay" class="d-none d-sm-block">Simpan</span>')
                $("#form-TambahSoalEssay")[0].reset()
                setTimeout(function() {
                    // $("#simpan").removeAttr('disabled')
                    window.location.href = "/asesor/review-soal/"+data.jadwal_id+"/"+data.jenis_tes;
                },2000);
                swal({
                    title: "Berhasil",
                    text: `${data.msg}`,
                    icon: "success",
                    successMode: true,
                });
            }
          }
        });
    });

    $('#form-TambahSoalPilihanGanda').on('submit', function(e) {
        e.preventDefault();
        $("#simpan").attr('disabled','disabled');
        var search = $("#icon-button-simpan-pilihan-ganda")

        search.addClass("fa fa-spinner fa-spin")
        $("#text-simpan-pilihan-ganda").html('')


        $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: new FormData(this),
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend: function() {
            $(document).find('label.error-text').text('');
          },
          success: function(data) {
            
            if (data.status == 0) {
                $.each(data.error, function(prefix, val) {
                    $('label.' + prefix + '_error').text(val[0]);
                    // $('span.'+prefix+'_error').text(val[0]);
                });
                $("#simpan").removeAttr('disabled')
                search.removeClass("fa fa-spinner fa-spin")
                $("#text-simpan-pilihan-ganda").html('<span id="text-simpan-pilihan-ganda" class="d-none d-sm-block">Simpan</span>')

            } 
            else if (data.status == 1) {
                search.removeClass("fa fa-spinner fa-spin")
                $("#text-simpan-pilihan-ganda").html('<span id="text-simpan-pilihan-ganda" class="d-none d-sm-block">Simpan</span>')
                setTimeout(function() {
                    // $("#simpan").removeAttr('disabled')
                    window.location.href = "/asesor/review-soal/"+data.jadwal_id+"/"+data.jenis_tes;
                },2000);
                swal({
                        title: "Berhasil",
                        text: `${data.msg}`,
                        icon: "success",
                        successMode: true,
                });
            }
          }
        });
    });

    document.getElementById('clear').addEventListener("click", clear);
    document.getElementById('simpan').addEventListener("click", sentToController);
    document.addEventListener("DOMContentLoaded", setupSignatureBox);

</script>
@endsection
