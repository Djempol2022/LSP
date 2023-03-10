@extends('layout.main-layout', ['title' => 'Pengesahan Materi Uji Kompetensi'])
@section('main-section')
<style>
  table thead{
          display: table-row-group;
        }
</style>
<div class="card page-content">
    <section class="row">
        <div class="p-5">
          @include('layout.header-berkas')
    
            <h6 class="text-center"><b>FR.APL.02. ASESMEN MANDIRI</b></h6>
          <div style="padding: 5%; padding-top:0%">   

              {{-- LEMBAR 1 --}}
              <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%;" cellspacing=0 cellpadding=5>
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
              <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%;" cellspacing=0 cellpadding=5>
                <thead>
                  <th style="background-color: #ffc6a5;"><h6>PANDUAN ASESMEN MANDIRI</h6></th>
                </thead>
                <tbody style="font-size: 13px">
                      <tr>
                        <td rowspan="2" style="width: 20%">
                          <h6 style="margin: 0; font-weight: lighter;">
                            Instruksi:<br>
                            Baca setiap pertanyaan di kolom sebelah kiri
                            Beri tanda centang () pada kotak jika Anda yakin dapat melakukan tugas yang dijelaskan.
                            Isi kolom di sebelah kanan dengan mendaftar bukti yang Anda miliki untuk menunjukkan bahwa Anda melakukan tugas-tugas ini.
                          </h6>
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
                <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%" cellspacing=0 cellpadding=5 id="demo-{{$data_unit_kompetensi->id}}">
                  <thead>
                    <tr>
                      <td style="width: 7%">
                        <h6 style="margin: 0; font-weight: bold;">Unit Kompetensi</h6>
                      </td>
                      <td colspan="5" style="width: 20%">
                        <h6 style="margin: 0; font-weight: bold;">{{$data_unit_kompetensi->kode_unit}}<br>{{$data_unit_kompetensi->judul_unit}}</h6>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: bold; ">Dapatkah Saya ................?</h6>
                      </td>
                      <td style="width: 3%">
                        <h6 style="margin: 0; font-weight: bold;">K</h6>
                      </td>
                      <td style="width: 3%">
                        <h6 style="margin: 0; font-weight: bold;">KB</h6>
                      </td>
                      <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: bold;">Bukti yang relevan</h6>
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
                          <td colspan="4" style="padding-top: 0.4%;padding-bottom: 0%; border:1px solid; page-break-inside: avoid;">
                            <p style="margin: 0%; padding:0%;">{{$index+1}}. Elemen: {{ $data_unit_kompetensi_sub->judul_unit_kompetensi_sub }} </p>
                            <p style="margin: 0%; padding:0%; padding-left:5%;">Kriteria Unjuk Kerja:</p>
                          </td>
                          {{-- <td rowspan="{{$dd+1}}" style="border:1px solid; page-break-inside: avoid;">
                            <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                          </td> --}}
                        </tr>
                        {{-- <tr>
                          <td>
                            <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                          </td>
                        </tr> --}}
                          @forelse ($unit_kompetensi_isi as $index2 => $isi)
                          @php
                              $data_status_kompeten_asesi = \App\Models\StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id',$isi->id)
                                    ->where('user_asesi_id', $user_asesi_id)->first();
                              $j = 1;
                          @endphp
                          <tr>
                              <td style="padding-top: 0.4%;padding-bottom: 0%; border:1px solid; page-break-inside: avoid;">
                                <p style="margin: 0%; padding:0%; padding-left:5%;">{{$index+1}}.{{$index2+1}} {{$isi->judul_unit_kompetensi_isi}}</p>
                              </td>
                              @isset($data_status_kompeten_asesi->status)
                                  @if ($data_status_kompeten_asesi->status == 'kompeten')
                                    <td colspan="0" class="text-center">
                                      <i class="fa fa-check"></i>
                                      <input type="hidden" value="{{$index2+1}}" hidden>
                                    </td>
                                    <td colspan="0">
                                      <input type="hidden" value="{{$index2+1}}" hidden>
                                    </td>
                                  @elseif($data_status_kompeten_asesi->status == 'belum kompeten')
                                    <td colspan="0">
                                      <input type="hidden" value="{{$index2+1}}" hidden>
                                    </td>
                                    <td colspan="0" class="text-center">
                                      <i class="fa fa-check"></i>
                                      <input type="hidden" value="{{$index2+1}}" hidden>
                                    </td>
                                  @endif
                              @else
                                <td colspan="0" class="text-center">
                                  <h6 style="margin: 0; font-weight: lighter;">?</h6>
                                </td>
                                <td colspan="0" class="text-center">
                                  <h6 style="margin: 0; font-weight: lighter;">?</h6>
                                </td>
                              @endisset
                              <td>
                                <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan {{$index+1}}</h6>
                              </td>
                            </tr>
                            @empty
                          @endforelse
                    @endforeach
                  </tbody>
                </table>
            @endforeach
            
            <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%;" cellspacing=0 cellpadding=5>
              <tbody style="font-size: 13px">
                <tr>
                  <td style="width:30%"><p>Nama Asesi : {{$data_asesmen_mandiri->relasi_user_asesi->nama_lengkap}}</p></td>
                  <td style="width:30%"><p>Tanggal : {{Carbon\Carbon::parse($data_asesmen_mandiri->tanggal_asesi)->format('d F Y')}}</p></td>
                  <td style="width:30%"><p>Tanda Tangan Asesi: </p><img src="{{$data_asesmen_mandiri->ttd_asesi}}" style="width: 40%"></td>
                </tr>
                <tr>
                  <td colspan="3" style="background-color: #ffc6a5;"><h6>Ditijau oleh Asesor:</h6></td>
                </tr>
                <tr>
                  <td style="width:30%"><h6>Nama Asesor : {{$data_asesmen_mandiri->relasi_user_asesor->nama_lengkap}}</h6></td>
                  <td style="width:30%"><h6>Rekomendasi : @if($data_asesmen_mandiri->rekomendasi == 1)Asesmen dapat dilanjutkan / <s>tidak dapat dilanjutkan</s> @elseif($data_asesmen_mandiri->rekomendasi == 0)<s>Asesmen dapat dilanjutkan</s> / tidak dapat dilanjutkan @endif</h6></td>
                  <td style="width:30%"><h6>Tanda Tangan Asesi: </h6><img src="{{$data_asesmen_mandiri->ttd_asesor}}" style="width: 40%"></td>
                </tr>
              </tbody>
            </table>
              {{-- <a href="{{route('admin.CetakAsesmenMandiri', ['jurusan_id'=>$jurusan_id, 'user_asesi_id'=>$user_asesi_id])}}" target="print_frame" class="btn btn-sm btn-link"><i class="la la-print"></i> Print</a> --}}
             
              <a href="{{route('admin.CetakAsesmenMandiri', ['jurusan_id'=>$jurusan_id, 'user_asesi_id'=>$user_asesi_id])}}" target="_blank" class="btn btn-sm btn-primary">Simpan ke PDF</a>
          </div>
      </div>
    </section>
  </div>

@endsection
@section('script')
<script>
  let unit_komp = @json($unit_kompetensi);

  $.each(unit_komp, function(key, value) {
    $("#demo-"+value.id).rowspanizer({
      vertical_align: 'middle'
    });
  });
</script>
@endsection