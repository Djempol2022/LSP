@extends('layout.main-layout', ['title' => 'Review Jawaban'])
@section('main-section')
<div class="container-fluid" style="margin-top: 20px;">
    <nav class="jalur-file mb-5" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-black text-decoration-none"
              href="{{ route('asesi.Assesment') }}">Assesment</a></li>
          <li class="breadcrumb-item active text-primary fw-semibold">Review Jawaban</li>
        </ol>
      </nav>
  {{-- JALUR FILE --}}
  {{-- <nav class="jalur-file mb-5" aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                  href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                  href="{{ route('asesi.Assesment') }}">Assesment</a></li>
          <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Desain Grafis (Fotografi dan
              Videografi) </li>
      </ol>
  </nav> --}}
  {{-- <h3 class="mt-5" id="timer"></h3> --}}
  <div class="row col gap-5 ms-0 mt-2">
    @foreach ($soal as $data_soal)
      @php
          $jawaban_asesi = \App\Models\JawabanAsesi::where('soal_id', $data_soal->id)->where('user_asesi_id', Auth::user()->id)->get();
          $pelaksanaan_ujian = \App\Models\PelaksanaanUjian::where('jadwal')
      @endphp
          <div class="col-lg-auto soal px-0">
              <div class="col-12 pernyataan">
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
                                    @elseif ($jenis_tes->jenis_tes == 2)
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="form-group has-icon-left">
                                                <p class="card-title">Jawaban : {{$data_jawaban_asesi->jawaban}}</p>                                                    
                                            </div>
                                        </div>
                                      </div>
                                    @endif
                                    @endforeach
                              </div>

                          </div>
                      </div>
                  </div>
              </div>

              {{-- <div class="col-md-12 row gap-4 d-flex soal-next-btn mt-5 mx-0">
                  <a href="{{route('asesi.PengerjaanSoal',['jadwal_id'=>$pelaksanaan_ujian->jadwal_uji_kompetensi_id, 'soal_id'=>$sebelumnya ?? $soal_id])}}" 
                      class="btn btn-secondary tombol-primary-small col-6">< Sebelumnya</a>
                  <button type="submit" class="btn btn-secondary tombol-primary-small col-6">Selanjutnya >
                      <a href="{{route('asesi.PengerjaanSoal',
                          ['jadwal_id'=>$pelaksanaan_ujian->jadwal_uji_kompetensi_id, 'soal_id'=>$selanjutnya ?? $soal_id ])}}"></a>
                  </button>
                  <button class="btn btn-sm rounded-4">Kembali</button>
              </div> --}}
          </div>

          @endforeach
      {{-- <div class="col-lg-auto nomor d-flex">
          <div class="col-12 row justify-content-center mt-4 text-center">
              <div class="col-12 gap-3 row mt-4 jarak-nomor-soal">
                  @foreach ($semua_soal as $index => $data_semua_soal)
                      @php
                          $jawaban_asesi_penomoran = \App\Models\JawabanAsesi::where('user_asesi_id', Auth::user()->id)
                              ->where('soal_id', $data_semua_soal->id)->first() ?? new \App\Models\JawabanAsesi();
                          $i = $index+1;
                      @endphp
                          
                          <div class="col-md-auto 
                          @if($jawaban_asesi_penomoran->soal_id == $data_semua_soal->id && $jawaban_asesi_penomoran->jawaban != null) 
                          bg-success 
                          @else 
                          bg-secondary 
                          @endif 
                          text-white p-2 btn-number">
                          <a class="text-white" href="{{route('asesi.PengerjaanSoal',
                                  ['jadwal_id'=>$pelaksanaan_ujian->jadwal_uji_kompetensi_id, 'soal_id'=>$data_semua_soal->id])}}">{{$i}}
                              </a>
                          </div>
                  @endforeach
              
              </div>

              <div class="col-12 d-flex justify-content-center">
                  <a href="#" class="btn btn-primary tombol-primary-max ms-4 mb-5">Kembali</a>
              </div>
          </div>
      </div> --}}

  </div>
</div>
@endsection
 