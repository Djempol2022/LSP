@extends('layout.main-layout', ['title' => 'Pengesahan Materi Uji Kompetensi'])
@section('main-section')
<div class="card page-content">
    <section class="row">
        <div class="p-5">
          @include('layout.header-berkas')
    
            <h6 class="text-center"><b>FR.APL.02. ASESMEN MANDIRI</b></h6>
          <div style="padding: 5%; padding-top:0%">   

              {{-- LEMBAR 1 --}}
              <p class="card-text">
                  <h6>Bagian  2 :  Data Sertifikasi</h6>
              </p>
              <p class="card-text" style="width: 100%;">
                  Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan berikut Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.
              </p>
              <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%" cellspacing=0 cellpadding=5>
                  <tbody style="font-size: 13px">
                        <tr>
                          <td rowspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">Skema Sertifikasi   (KKNI/Okupasi/Klaster)</h6>
                          </td>
                          <td style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">Judul</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">{{$sertifikasi->relasi_unit_kompetensi->relasi_skema_sertifikasi->judul_skema_sertifikasi}}</h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">Nomor</h6>
                          </td>
                          <td style="width: 10%">
                              <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">{{$sertifikasi->relasi_unit_kompetensi->relasi_skema_sertifikasi->nomor_skema_sertifikasi}}</h6>
                          </td>
                        </tr>

                  </tbody>
              </table>
              @foreach ($unit_kompetensi as $data_unit_kompetensi)
              @php
              $unit_kompetensi_sub = \App\Models\UnitKompetensiSub::with('relasi_unit_kompetensi.relasi_skema_sertifikasi')
                  ->whereRelation('relasi_unit_kompetensi', 'unit_kompetensi_id', $data_unit_kompetensi->id)
                  ->get();
              @endphp
                <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%" cellspacing=0 cellpadding=5>
                  <thead>
                    <tr>
                      <td style="width: 7%">
                        <h6 style="margin: 0; font-weight: lighter;">Unit Kompetensi</h6>
                      </td>
                      <td colspan="3" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">{{$data_unit_kompetensi->judul_unit}}</h6>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Dapatkah Saya ................?</h6>
                      </td>
                      <td style="width: 3%">
                        <h6 style="margin: 0; font-weight: lighter;">K</h6>
                      </td>
                      <td style="width: 3%">
                        <h6 style="margin: 0; font-weight: lighter;">KB</h6>
                      </td>
                      <td rowspan="5" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                      </td>
                    </tr>
                  </thead>
                  <tbody style="font-size: 13px">
                    @foreach ($unit_kompetensi_sub as $index => $data_unit_kompetensi_sub)
                      @php
                      $unit_kompetensi_isi = \App\Models\UnitKompetensiIsi::with('relasi_unit_kompetensi_sub')
                          ->whereRelation('relasi_unit_kompetensi_sub', 'unit_kompetensi_sub_id', $data_unit_kompetensi_sub->id)
                          ->get();

                      $dd = \App\Models\UnitKompetensiIsi::with('relasi_unit_kompetensi_sub')
                          ->whereRelation('relasi_unit_kompetensi_sub', 'unit_kompetensi_sub_id', $data_unit_kompetensi_sub->id)
                          ->count();
                      $i = 1;
                      @endphp
                        
                        <tr>
                          <td colspan="3">
                            <p style="margin: 0%; padding:0%;">{{$i++}}. Elemen: {{ $data_unit_kompetensi_sub->judul_unit_kompetensi_sub }}</p>
                            <p style="margin: 0%; padding:0%; padding-left:5%;">Kriteria Unjuk Kerja:</p>
                          </td>
                          <td rowspan="{{$dd+1}}">
                            <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                          </td>
                        </tr>
                        {{-- <tr>
                          <td>
                            <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                          </td>
                        </tr> --}}
                          @forelse ($unit_kompetensi_isi as $isi)
                          @php
                              $data_status_kompeten_asesi = \App\Models\StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id',$isi->id)
                                    ->where('user_asesi_id', $user_asesi_id)->first();
                              $j = 1;
                          @endphp
                          <tr>
                              <td>
                                {{$isi->judul_unit_kompetensi_isi}}
                              </td>
                              <td colspan="0">
                                <h6 style="margin: 0; font-weight: lighter;">K</h6>
                              </td>
                              <td colspan="0">
                                <h6 style="margin: 0; font-weight: lighter;">KB</h6>
                              </td>
                            </tr>
                            @empty
                          @endforelse
                    @endforeach
                  </tbody>
                </table>
              @endforeach
            
              
             
              <a href="{{route('admin.CetakAsesmenMandiri', ['jurusan_id'=>$jurusan_id, 'user_asesi_id'=>$user_asesi_id])}}" target="_blank" class="btn btn-sm btn-primary">Simpan ke PDF</a>
          </div>
      </div>
    </section>
  </div>

@endsection
{{-- @section('script')
<script>
  $("#demo").rowspanizer({
    vertical_align: 'middle'
  });
</script>
@endsection --}}