@extends('layout.main-layout', ['title' => 'Detail Asesmen Mandiri'])
@section('main-section')
<div class="container mt-5 jalur-file">
  {{-- JALUR FOLDER --}}
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                  href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{route('admin.Assessment')}}">Asessment</a></li>
          <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Detail Asesmen Mandiri</li>
      </ol>
  </nav>
<div class="container-fluid">
    <section class="section">
      <div class="card">
        <div class="container mt-2 jalur-file" id="profile-section">
            <div class="col profil-section">
              {{-- HEADER --}}
              <div class="col">
                <div class="assesment-mandiri-header">
                  <p class="assesment-mandiri-title">Judul Skema Sertifikasi</p>
                  <p>{{ $sertifikasi->relasi_unit_kompetensi->relasi_skema_sertifikasi->judul_skema_sertifikasi }}</p>
                </div>
                <div class="assesment-mandiri-header">
                  <p class="assesment-mandiri-title">Nomor Skema Sertifikasi</p>
                  <p>{{ $sertifikasi->relasi_unit_kompetensi->relasi_skema_sertifikasi->nomor_skema_sertifikasi }}</p>
                </div>
                <div class="assesment-mandiri-header">
                  <p class="assesment-mandiri-title">Skema Sertifikasi</p>
                  <p>{{ $sertifikasi->relasi_unit_kompetensi->jenis_standar }}</p>
                </div>
              </div>
              {{-- TITLE --}}
            @foreach ($unit_kompetensi as $data_unit_kompetensi)
              <div class="col">
                <div class="row col unit-kompetensi">
                  <span>Unit Kompetensi</span><br>
                  <div class="col row fs-6">
                    <div class="col-lg-auto unit-kode" style="width: auto !important">{{ $data_unit_kompetensi->kode_unit }}</div>
                    <div class="col-lg-auto unit-isi">{{ $data_unit_kompetensi->judul_unit }}
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="my-4 fw-bold fs-6">Dapatkah Saya ?</div>
              <div class="col mb-5">
                <ol class="list-group list-group-numbered">
                    @php
                    $unit_kompetensi_sub = \App\Models\UnitKompetensiSub::with('relasi_unit_kompetensi.relasi_skema_sertifikasi')
                        ->whereRelation('relasi_unit_kompetensi', 'unit_kompetensi_id', $data_unit_kompetensi->id)
                        ->get();
                    @endphp
                  @foreach ($unit_kompetensi_sub as $data_unit_kompetensi_sub)
                    @php
                    $unit_kompetensi_isi = \App\Models\UnitKompetensiIsi::with('relasi_unit_kompetensi_sub')
                        ->whereRelation('relasi_unit_kompetensi_sub', 'unit_kompetensi_sub_id', $data_unit_kompetensi_sub->id)
                        ->get();
                    @endphp
    
                    <li class="list-group-item d-flex justify-content-between align-items-start border-0 fw-semibold">
                      <div class="ms-2 me-auto ">
                        Elemen: {{ $data_unit_kompetensi_sub->judul_unit_kompetensi_sub }}
                        <div class="py-1">Kriteria Kerja:</div>
                        <div class="row col mx-3">
                        @forelse ($unit_kompetensi_isi as $isi)
                          @php
                              $data_status_kompeten_asesi = \App\Models\StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id',$isi->id)
                                    ->where('user_asesi_id', $user_asesi_id)->first();
                          @endphp
                          <div class="col mb-3">
                            <div class="row mt-3">
                              <div class="col-auto kriteria-nomor" style="width: 6%">{{ $loop->parent->iteration }}.{{ $loop->iteration }}
                              </div>
                              <div class="col-auto kriteria-isi">{{ $isi->judul_unit_kompetensi_isi }}
                              </div>
                              {{-- <input type="hidden" name="unit_kompetensi_sub[]" value="{{$isi->unit_kompetensi_sub_id}}" hidden>
                              <input type="hidden" name="unit_kompetensi_isi[]" value="{{$isi->id}}" hidden> --}}
    
                              <div class="col-auto kriteria-kompeten">
                                @if($data_status_kompeten_asesi->status === 'kompeten')
                                    <label class="form-check-label text-success" for="kompeten-{{ $isi->id }}">Kompeten</label>
                                @else
                                    <label class="form-check-label text-danger" for="kompeten-{{ $isi->id }}">Belum Kompeten</label>
                                @endif
                              </div>

                            </div>
                          </div>
                          <hr>
                        @empty
                          Kosong
                        @endforelse
                        </div>
                        <div class="col mt-4">
                          <div class="mb-3 fw-semibold fs-6">
                            <label for="bukti_relevan-{{ $data_unit_kompetensi_sub->id }}"
                              class="form-label">Bukti yang relevan</label>
                            <p class="form-label">{{ $data_unit_kompetensi_sub->bukti_relevan ?? '' }}</p>
                          </div>
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ol>
              </div>
            @endforeach
            
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
                      <p>{{$data_asesmen_mandiri->relasi_user_asesi->nama_lengkap}}</p>
                    </div>
                    <div class="col edit-profil-left">
                      <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                      <p>{{ Carbon\Carbon::parse($data_asesmen_mandiri->tanggal_asesi)->format('d F Y') }}</p>
                    </div>
                    {{-- TANDA TANGAN / TTD --}}
                    <label for="signature-pad" class="form-label fw-semibold">Tanda Tangan</label>
                    <div class="mb-2">
                      @isset($data_asesmen_mandiri->ttd_asesi)
                        <img src="{{ $data_asesmen_mandiri->ttd_asesi }}" alt="ttd_asesi" width="180px">
                      @endisset
                    </div>

                  </div>
                  <div class="col-lg-6">
                    <h5>Mengetahui Asesor</h5>
                        <div class="col edit-profil-left">
                        <label for="namaAsesi" class="form-label fw-semibold">Nama Asesor</label>
                            @isset($data_asesmen_mandiri->relasi_user_asesor->nama_lengkap)
                              <p>{{$data_asesmen_mandiri->relasi_user_asesor->nama_lengkap}}</p>
                            @else
                              <p>Nama Asesor Belum Di Ketahui</p>
                            @endisset
                        </div>
                        <div class="col edit-profil-left">
                        <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                          <p>{{ Carbon\Carbon::parse($data_asesmen_mandiri->tanggal_asesor)->format('d F Y') }}</p>
                        </div>
                        <div class="col edit-profil-left">
                          <label for="rekomendasi" class="form-label fw-semibold">Rekomendasi</label>
                          <div class="col-auto kriteria-kompeten" style="width: auto;">
                          @if ($data_asesmen_mandiri->rekomendasi === null)
                          <label class="form-check-label"><a href="{{route('asesor.SetujuiAsesmen', $data_asesmen_mandiri->id)}}" class="text-success">Asesmen dapat dilanjutkan</a>&nbsp;/&nbsp;</label>
                          <label class="form-check-label"><a href="{{route('asesor.BatalkanAsesmen', $data_asesmen_mandiri->id)}}" class="text-danger">tidak dapat dilanjutkan</a></label>
                          @elseif ($data_asesmen_mandiri->rekomendasi === 1)
                          <label class="form-check-label"><a href="#!" class="text-success">Asesmen dapat dilanjutkan/</a></label>
                          <label class="form-check-label"><a href="#!" class="text-danger"><s>tidak dapat dilanjutkan</s></a></label>
                          @elseif ($data_asesmen_mandiri->rekomendasi === 0)
                          <label class="form-check-label"><a href="#!" class="text-success"><s>Asesmen dapat dilanjutkan/</s></a></label>
                          <label class="form-check-label"><a href="#!" class="text-danger">tidak dapat dilanjutkan</a></label>
                          @endif
                          </div>
                        </div>
                        <div class="col edit-profil-left">
                          <label for="signature-pad" class="form-label fw-semibold">Tanda Tangan</label>
                          <div class="col-auto kriteria-kompeten" style="width: auto;">
                            @isset($data_asesmen_mandiri->ttd_asesor)
                                <img src="{{ $data_asesmen_mandiri->ttd_asesor }}" alt="ttd_asesi" width="180px">
                            @endisset
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
</div>
  @endsection
@section('script')
<script>

    let data_asesmen_mandiri = @json($data_asesmen_mandiri);
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
        let ttdData = data_asesmen_mandiri.ttd_asesi;
        document.getElementById('ttd_asesi').value = ttdData;
      } else {
        let ttdData = signaturePad.toDataURL();
        document.getElementById('ttd_asesi').value = ttdData;
      }
    }

    document.getElementById('clear').addEventListener("click", clear);
    document.getElementById('simpan').addEventListener("click", sentToController);
    document.addEventListener("DOMContentLoaded", setupSignatureBox);
</script>
@endsection
