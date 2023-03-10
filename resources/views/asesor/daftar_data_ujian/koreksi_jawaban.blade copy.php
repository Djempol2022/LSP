@extends('layout.main-layout', ['title' => 'Koreksi Soal'])
@section('main-section')
<div class="container-fluid" style="margin-top: 20px;">
  <div id="demo"> </div>
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                  href="{{ route('asesor.KelolaSoal') }}">Data Ujian</a></li>
          <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Koreksi Soal</li>
      </ol>
  </nav>
  {{-- <h3 class="mt-5" id="timer"></h3> --}}
  <div class="row col gap-5 ms-0 mt-2">
    @foreach ($soal as $data_soal)
    @php
        $jawaban_asesi = \App\Models\JawabanAsesi::where('soal_id', $data_soal->id)->where('user_asesi_id', $asesi_id)->get();
        $hitung_total_soal = \App\Models\Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)->count();
        // $jawaban_benar = \App\Models\JawabanAsesi::with('relasi_soal')
        //       ->whereRelation('relasi_soal', 'jadwal_uji_kompetensi_id', $jadwal_id)
        //       ->where('jawaban', $data_soal->jawaban)
        //       ->count();
    @endphp
        <div class="col-md-12 px-0">
            <div class="col-12 pernyataan"
            {{-- @foreach ($jawaban_asesi as $data_jawaban_asesi)
                @if($data_soal->jawaban != $data_jawaban_asesi->jawaban) style="background-color:#bcc7ff" @else @endif
            @endforeach --}}>

                <div class="col isi">
                    <p class="text-black fw-semibold">{{$data_soal->pertanyaan}}</p>
                    <div class="col row mt-4">
                        <div class="col-lg-12">
                            <div class="col-lg-12 mb-4">
                                @php
                                    $pilihan = explode(";", $data_soal->pilihan);
                                    $nomor_pilihan = 1;
                                    $alfabet = "A";
                                @endphp
                                @foreach ($jawaban_asesi as $data_jawaban_asesi)
                                @php
                                $jawaban_benar = \App\Models\Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)
                                ->select('jadwal_uji_kompetensi_id', 'jawaban')->where('jawaban', '=', $data_jawaban_asesi->jawaban)->get();
                              @endphp
                                @if ($jenis_tes->jenis_tes == 1)
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
                                @elseif ($jenis_tes->jenis_tes == 2)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <p class="card-title">Jawaban Asesi: {{$data_jawaban_asesi->jawaban}}</p>                                                    
                                        </div>
                                        <div class="form-group has-icon-left">
                                          <p class="card-title">Jawaban Benar: {{$data_soal->jawaban}}</p>                                                    
                                      </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-md-end">
                                      <span class="btn btn-sm btn-danger" onclick="jawabanSalah({{$data_soal->id}})"><i class="fa fa-times"></i></span>
                                  </div>
                                </div>
                                @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-md-12 px-0">
      <div class="col-12 pernyataan">
        <div class="col isi">
          <div class="row">
            <div class="col-4 col-md-2"><h5>Total Soal </h5></div>
            <div class="col-2 col-md-2"><h5>: {{$hitung_total_soal}}</h5></div>
          </div>
          <div class="row">
            <div class="col-4 col-md-2"><h6 style="color:blue;">Jawaban Salah</h6></div>
            <div class="col-2 col-md-2"><h6 style="color:blue;"> : </h6></div>
          </div>
          <div class="row">
            <div class="col-4 col-md-2"><h6 style="color:rgb(255, 81, 12);">Jawaban Benar</h6></div>
            <div class="col-2 col-md-2"><h6 style="color:rgb(255, 81, 12);"> : {{$jawaban_benar}} </h6></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 px-0">
        <div class="col-12 pernyataan">
            <div class="col isi">
                <form action="{{route('asesor.HasilKoreksiJawaban', ['jadwal_id'=>$jadwal_id, 'asesi_id'=>$asesi_id])}}" method="POST" id="form-hasilKoreksiJawaban">
                    <div class="row my-4">
                        @csrf
                        <div class="col-md-6">
                            <div class="col pb-4">
                              <div class="row">
                                <div class="col-4 col-md-2"><label class="form-label fw-semibold">Keterangan</label></div>
                              </div>
                              <div class="row">
                                <div class="col-4 col-md-4">
                                <input class="form-check-input me-1" type="radio"
                                  name="status_kompeten" value="1" id="kompeten-1" 
                                  @isset($data_hasil_koreksi->status_kompeten)
                                    @if ($data_hasil_koreksi->status_kompeten == 1)
                                      @checked(true)
                                    @endif
                                  @endisset
                                  >
                                <label class="form-check-label text-success"
                                  for="kompeten-1">Kompeten</label>
                                </div>
                                <div class="col-4 col-md-6">
                                <input class="form-check-input me-0" type="radio"
                                  name="status_kompeten" value="0"
                                  id="kompeten-0"
                                  @isset($data_hasil_koreksi->status_kompeten) 
                                    @if ($data_hasil_koreksi->status_kompeten == 0)
                                        @checked(true)
                                    @endif
                                  @endisset>
                                <label class="form-check-label text-danger"
                                  for="kompeten-0">Belum Kompeten</label>
                              </div>
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
                                <div class="col edit-profil mb-2 signature-pad" id="signature-pad">
                                  <canvas id="sig"></canvas>
                                  <input type="hidden" name="ttd_asesor" value="" id="ttd" hidden>
                                </div>
                                <div class="mb-2">
                                  @isset($data_hasil_koreksi->ttd_asesor)
                                    <img src="{{ $data_hasil_koreksi->ttd_asesor }}" alt="ttd" width="180px">
                                  @endisset
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

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary tombol-primary-small" id="simpan">Simpan</button>
                              </div>
                </form>
            </div>
        </div>
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

    $('#jawabanSalah').on('submit', function(e) {
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
                // table_jurusan.ajax.reload(null, false)
              // $("#modalJadwalUjiKompetensi").modal('hide')
            }
          }
        });
      });

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

</script>
@endsection

 