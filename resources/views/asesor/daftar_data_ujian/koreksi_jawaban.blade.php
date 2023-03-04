@extends('layout.main-layout', ['title' => 'Koreksi Soal'])
@section('main-section')
<div class="container-fluid" style="margin-top: 20px;">
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                  href="{{ route('asesor.DaftarDataUjian') }}">Data Ujian</a></li>
          <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Koreksi Soal</li>
      </ol>
  </nav>

  <section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                  <div class="col profil-section-title">
                    Detail Jadwal Ujian
                  </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Nama Asesi</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" value="{{$asesi->nama_lengkap}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tanggal Ujian</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" value="{{ Carbon\Carbon::parse($jenis_tes->tanggal)->format('d F Y') }}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Waktu Ujian</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                      <input class="form-control" value="Pukul {{ Carbon\Carbon::parse($jenis_tes->waktu_mulai)->format('H:m') }} s/d {{ Carbon\Carbon::parse($jenis_tes->waktu_selesai)->format('H:m') }} WIB">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Materi Uji Kompetensi</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                      <input class="form-control" value="{{$jenis_tes->relasi_jadwal_uji_kompetensi->relasi_muk->muk}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                      <label>Kelas</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                      <input class="form-control" value="{{$jenis_tes->kelas}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                      <label>Sesi</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                      <input class="form-control" value="{{$jenis_tes->sesi}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <div class="row col gap-3 ms-0 mb-2" id="koreksiSoal">
    @foreach ($soal as $data_soal)
    @php
        $jawaban_asesi = \App\Models\JawabanAsesi::with('relasi_soal.relasi_jadwal_uji_kompetensi')
              ->whereRelation('relasi_soal.relasi_jadwal_uji_kompetensi', 'jadwal_uji_kompetensi_id', $jadwal_id)
              ->where('soal_id', $data_soal->id)
              ->where('user_asesi_id', $asesi_id)
              ->get();
        $hitung_total_soal = \App\Models\Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)->count();
        
    @endphp
    @php
      $pilihan = explode(";", $data_soal->pilihan);
      $nomor_pilihan = 1;
      $alfabet = "A";
    @endphp
    @foreach ($jawaban_asesi as $data_jawaban_asesi)
    @php
        $total_jawaban_benar = $data_jawaban_asesi->where('user_asesi_id', $asesi_id)->with('relasi_soal.relasi_jadwal_uji_kompetensi')
              ->whereRelation('relasi_soal.relasi_jadwal_uji_kompetensi', 'jadwal_uji_kompetensi_id', $jadwal_id)->where('koreksi_jawaban', 2)->count();
        $total_jawaban_salah = $data_jawaban_asesi->where('user_asesi_id', $asesi_id)->with('relasi_soal.relasi_jadwal_uji_kompetensi')
              ->whereRelation('relasi_soal.relasi_jadwal_uji_kompetensi', 'jadwal_uji_kompetensi_id', $jadwal_id)->where('koreksi_jawaban', 1)->count();

        // $total_jawaban_benar = $data_jawaban_asesi->with('relasi_soal.relasi_jadwal_uji_kompetensi')
        //       ->whereRelation('relasi_soal.relasi_jadwal_uji_kompetensi', 'jadwal_uji_kompetensi_id', $jadwal_id)->where('koreksi_jawaban', 2)->count();
        // $total_jawaban_salah = $data_jawaban_asesi->with('relasi_soal.relasi_jadwal_uji_kompetensi')
        //       ->whereRelation('relasi_soal.relasi_jadwal_uji_kompetensi', 'jadwal_uji_kompetensi_id', $jadwal_id)->where('koreksi_jawaban', 1)->count();
    @endphp
        @if ($jenis_tes->jenis_tes == 1)
        <div class="col-md-12 px-0">
          <div class="col-12 pernyataan" 
          @if($data_jawaban_asesi->koreksi_jawaban == null || $data_jawaban_asesi->koreksi_jawaban == 1)
            style="outline-style: solid; outline-color: rgba(201, 76, 76, 0.3);"
          @elseif($data_jawaban_asesi->koreksi_jawaban == 2)
            style="outline-style: solid; outline-color: rgba(120, 212, 77, 0.58);"
          @endif
          {{-- @foreach ($jawaban_asesi as $data_jawaban_asesi)
              @if($data_soal->jawaban != $data_jawaban_asesi->jawaban) style="background-color:#bcc7ff" @else @endif
          @endforeach --}}>
            <div class="col isi">
                <p class="text-black fw-semibold">{{$data_soal->pertanyaan}}</p>
                <div class="col row mt-4">
                    <div class="col-lg-12">
                        <div class="col-lg-12 mb-4">
                                @foreach ($pilihan as $pilihan_tersedia)
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                    <input class="form-check-input" type="checkbox" value="{{$nomor_pilihan}}"
                                        @if($data_jawaban_asesi->jawaban == $nomor_pilihan)
                                            id="soal{{$nomor_pilihan}}" checked
                                        @endif onclick="return false">
                                        <label class="form-check-label text-success" for="soal{{$nomor_pilihan}}" value="{{$nomor_pilihan++}}">
                                            <span>
                                            {{$alfabet++}}. {{$pilihan_tersedia}}
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                                <div class="form-group has-icon-left">
                                  <h6 class="card-title">Jawaban Benar : @if($data_soal->jawaban == 1) A @elseif ($data_soal->jawaban==2) B @elseif ($data_soal->jawaban==3)C @elseif ($data_soal->jawaban==4)D @endif</h6>                                                    
                                </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        @elseif ($jenis_tes->jenis_tes == 2)
          @foreach ($jawaban_asesi as $data_jawaban_asesi)
            @if($data_jawaban_asesi->koreksi_jawaban == null)
              <div class="card">
                <div class="card-header">
                  <div class="buttons" style="display: flex;">
                      <button soal-id = {{$data_jawaban_asesi->id}} class="btn btn-sm icon btn-danger jawaban_salah"><i class="fa fa-times"></i></button>
                      <button soal-id = {{$data_jawaban_asesi->id}} class="btn btn-sm icon btn-success jawaban_benar"><i class="fa fa-check"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$data_soal->pertanyaan}}</h5>
                  <p class="card-text">Jawaban Asesi: {{$data_jawaban_asesi->jawaban}}</p>
                </div>
              </div>
              @elseif($data_jawaban_asesi->koreksi_jawaban == 1)
              <div class="card" style="margin-bottom: 0%; outline-style: solid; outline-color: rgba(201, 76, 76, 0.3);">
                <div class="card-body">
                  <h5 class="card-title">{{$data_soal->pertanyaan}}</h5>
                  <p class="card-text">Jawaban Asesi: {{$data_jawaban_asesi->jawaban}}</p>
                </div>
              </div>
              @elseif($data_jawaban_asesi->koreksi_jawaban == 2)
              <div class="card" style="margin-bottom: 0%; outline-style: solid; outline-color: rgba(120, 212, 77, 0.58);">
                <div class="card-body">
                  <h5 class="card-title">{{$data_soal->pertanyaan}}</h5>
                  <p class="card-text">Jawaban Asesi: {{$data_jawaban_asesi->jawaban}}</p>
                </div>
              </div>
            @endif
          @endforeach
          @elseif ($jenis_tes->jenis_tes == 3)
          @foreach ($jawaban_asesi as $data_jawaban_asesi)
            @if($data_jawaban_asesi->koreksi_jawaban == null)
              <div class="card">
                <div class="card-header">
                  <div class="buttons" style="display: flex;">
                      <button soal-id = {{$data_jawaban_asesi->id}} class="btn btn-sm icon btn-danger jawaban_salah"><i class="fa fa-times"></i></button>
                      <button soal-id = {{$data_jawaban_asesi->id}} class="btn btn-sm icon btn-success jawaban_benar"><i class="fa fa-check"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$data_soal->pertanyaan}}</h5>
                  <p class="card-text">Jawaban Asesi: {{$data_jawaban_asesi->jawaban}}</p>
                </div>
              </div>
              @elseif($data_jawaban_asesi->koreksi_jawaban == 1)
              <div class="card" style="margin-bottom: 0%; outline-style: solid; outline-color: rgba(201, 76, 76, 0.3);">
                <div class="card-body">
                  <h5 class="card-title">{{$data_soal->pertanyaan}}</h5>
                  <p class="card-text">Jawaban Asesi: {{$data_jawaban_asesi->jawaban}}</p>
                </div>
              </div>
              @elseif($data_jawaban_asesi->koreksi_jawaban == 2)
              <div class="card" style="margin-bottom: 0%; outline-style: solid; outline-color: rgba(120, 212, 77, 0.58);">
                <div class="card-body">
                  <h5 class="card-title">{{$data_soal->pertanyaan}}</h5>
                  <p class="card-text">Jawaban Asesi: {{$data_jawaban_asesi->jawaban}}</p>
                </div>
              </div>
            @endif
          @endforeach
      @if ($jenis_tes->jenis_tes == 3)
      @else
      <div class="card" style="margin-top: -4.0rem;">
        <div class="card-body">
          Kunci Jawaban : {{$data_soal->jawaban}}
        </div>
      </div>
      @endif

        @endif
        @endforeach
    @endforeach
    @if ($jenis_tes->jenis_tes != 3)
      <div class="col-md-12 px-0">
        <div class="col-12 pernyataan">
          <div class="col isi">
            <div class="row">
              <div class="col-4 col-md-2"><h6>Total Soal </h6></div>
              <div class="col-2 col-md-2"><h6>: {{$hitung_total_soal}} Soal</h6></div>
            </div>
            <div class="row">
              <div class="col-4 col-md-2"><h6 style="color:green;">Jawaban Benar</h6></div>
              <div class="col-2 col-md-2"><h6 style="color:green;"> : {{$total_jawaban_benar}} Soal</h6></div>
            </div>
            <div class="row">
              <div class="col-4 col-md-2"><h6 style="color:red;">Jawaban Salah</h6></div>
              <div class="col-2 col-md-2"><h6 style="color:red;"> : {{$total_jawaban_salah}} Soal</h6></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
</div>
<div class="col-md-12 px-0 mt-4">
  <div class="col-12 pernyataan">
      <div class="col isi">
        @if ($jenis_tes->jenis_tes == 3)
        <div class="row">
          <div class="col-2 col-md-2"><h6>Total Soal </h6></div>
          <div class="col-2 col-md-2"><h6>: {{$hitung_total_soal}}</h6></div>
        </div>
        @endif
          <form action="{{route('asesor.HasilKoreksiJawaban', ['jadwal_id'=>$jadwal_id, 'asesi_id'=>$asesi_id])}}" method="POST" id="form-hasilKoreksiJawaban">
              <div class="row my-4">
                  @csrf
                  <div class="col-md-6">
                      <div class="col pb-4">
                        <div class="row">
                          <div class="col-4 col-md-2"><label class="form-label fw-semibold">Keterangan</label></div>
                        </div>
                        <div class="row">
                        
                          @if($data_hasil_koreksi->status_koreksi == 0)
                            <div class="col-4 col-md-4">
                              <input class="form-check-input me-1" type="radio"
                                name="status_kompeten" value="1" id="kompeten-1" 
                                >
                              <label class="form-check-label text-success"
                                for="kompeten-1">Kompeten</label>
                            </div>
                            <div class="col-4 col-md-6">
                              <input class="form-check-input me-0" type="radio"
                                name="status_kompeten" value="0"
                                id="kompeten-0"
                                >
                              <label class="form-check-label text-danger"
                                for="kompeten-0">Belum Kompeten</label>
                            </div>
                          @else
                          @if($data_hasil_koreksi->status_kompeten == 1)
                          <div class="col-4 col-md-4">
                            <input class="form-check-input me-1" type="radio"
                              name="status_kompeten" value="1" id="kompeten-1" 
                                @checked(true)>
                            <label class="form-check-label text-success"
                              for="kompeten-1">Kompeten</label>
                          </div>
                        @elseif($data_hasil_koreksi->status_kompeten == 0)
                          <div class="col-4 col-md-6">
                            <input class="form-check-input me-0" type="radio"
                              name="status_kompeten" value="0"
                              id="kompeten-0" @checked(true)>
                            <label class="form-check-label text-danger"
                              for="kompeten-0">Belum Kompeten</label>
                          </div>
                        @endif
                          @endif

                      </div>
                          <div class="input-group has-validation">
                              <label class="text-danger error-text status_kompeten_error"></label>
                          </div>
                      </div>
                      <div class="col pb-4">
                          <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                          <input type="date" id="tanggal" class="form-control rounded-4"
                              placeholder="Masukkan Tanggal" name="tanggal" 
                              @isset($data_hasil_koreksi->tanggal)
                              value="{{\Carbon\Carbon::parse($data_hasil_koreksi->tanggal)->format('Y-m-d')}}"
                              @else
                              value="{{\Carbon\Carbon::now()->format('Y-m-d')}}"
                              @endisset>
                          <div class="input-group has-validation">
                                  <label class="text-danger error-text tanggal_error"></label>
                          </div>
                      </div>
                      <div class="col pb-4">
                          <label for="signature-pad" class="form-label fw-semibold">Tanda Tangan</label>
                          @if($data_hasil_koreksi->status_koreksi == 1)
                          <div class="mb-2">
                              <img src="{{ $data_hasil_koreksi->ttd_asesor }}" alt="ttd" width="180px">
                          </div>
                          @else
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
                          @endif
                      </div>
                      @empty($data_hasil_koreksi->ttd_asesor)
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary tombol-primary-small" id="simpan">Simpan</button>
                        </div>
                      @endempty
          </form>
      </div>
  </div>
</div>
@endsection
@section('script')
<script>
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
        let ttdData = data.relasi_sertifikasi.ttd_asesi;
        document.getElementById('ttd').value = ttdData;
      } else {
        let ttdData = signaturePad.toDataURL();
        document.getElementById('ttd').value = ttdData;
      }
    }

    document.getElementById('clear').addEventListener("click", clear);
    document.getElementById('simpan').addEventListener("click", sentToController);
    document.addEventListener("DOMContentLoaded", setupSignatureBox);

    $('#form-hasilKoreksiJawaban').on('submit', function(e) {
        e.preventDefault();
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
            } else if (data.status == 1) {
              swal({
                  title: "Berhasil",
                  text: `${data.msg}`,
                  icon: "success",
                  buttons: true,
                  successMode: true,
                }),
                location.reload();
                // table_jurusan.ajax.reload(null, false)
              // $("#modalJadwalUjiKompetensi").modal('hide')
            }
          }
        });
      });


      $(document).on('click', '.jawaban_salah', function (event) {
        const id = $(event.currentTarget).attr('soal-id');
        $.ajax({
            url: "/asesor/pilih-jawaban-salah/" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 0) {
                    alert("Gagal Hapus")
                } else if (response.status == 1) {
                  $("#koreksiSoal").load(location.href + " #koreksiSoal>*", "");
                }
            }
        });
    });

    $(document).on('click', '.jawaban_benar', function (event) {
        const id = $(event.currentTarget).attr('soal-id');
        $.ajax({
            url: "/asesor/pilih-jawaban-benar/" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 0) {
                    alert("Gagal Hapus")
                } else if (response.status == 1) {
                  $("#koreksiSoal").load(location.href + " #koreksiSoal>*", "");
                }
            }
        });
    });

</script>
@endsection

 