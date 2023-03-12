@extends('layout.main-layout', ['title' => 'Detail Umpan Balik Asesi'])
@section('main-section')
<style>
  table thead{
          display: table-row-group;
        }
</style>
@foreach ($umpan_balik_asesi as $data_umpan_balik_asesi)
<div class="card page-content">
    <section class="row">
        <div class="p-5">
          @include('layout.header-berkas')
    
        <h6 class="text-center"><b>FR.AK.03. UMPAN BALIK DAN CATATAN ASESMEN</b></h6>
          <div style="padding: 5%; padding-top:0%">   

              {{-- LEMBAR 1 --}}
            
              <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%;" cellspacing=0 cellpadding=5>
                  <tbody style="font-size: 13px">
                        <tr>
                            <td style="width: 10%">
                                <h6 style="margin: 0; font-weight: lighter;">Nama Asesi</h6>
                            </td>
                            <td style="width: 2%">
                                <h6 style="margin: 0; font-weight: lighter;">:</h6>
                            </td>
                            <td style="width: 5%">
                                <h6 style="margin: 0; font-weight: lighter;">{{$data_umpan_balik_asesi->relasi_user_asesi->nama_lengkap}}</h6>
                            </td>
                            <td style="width: 5%">
                                <h6 style="margin: 0; font-weight: lighter;">Hari / Tanggal</h6>
                            </td>
                            <td style="width: 2%">
                                <h6 style="margin: 0; font-weight: lighter;">:</h6>
                            </td>
                            <td style="width: 5%">
                                <h6 style="margin: 0; font-weight: lighter;">{{Carbon\Carbon::parse($data_umpan_balik_asesi->relasi_jadwal_uji_kompetensi->relasi_pelaksanaan_ujian->tanggal)->format('d F Y')}}</h6>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 10%">
                                <h6 style="margin: 0; font-weight: lighter;">Nama Asesor</h6>
                            </td>
                            <td style="width: 2%">
                                <h6 style="margin: 0; font-weight: lighter;">:</h6>
                            </td>
                            <td style="width: 5%">
                                <h6 style="margin: 0; font-weight: lighter;">{{$data_umpan_balik_asesi->relasi_jadwal_uji_kompetensi->relasi_user_asesor->relasi_user_asesor_detail->nama_lengkap}}</h6>
                            </td>
                            <td style="width: 5%">
                                <h6 style="margin: 0; font-weight: lighter;">Waktu</h6>
                            </td>
                            <td style="width: 2%">
                                <h6 style="margin: 0; font-weight: lighter;">:</h6>
                            </td>
                            <td style="width: 5%">
                                <h6 style="margin: 0; font-weight: lighter;">{{Carbon\Carbon::parse($data_umpan_balik_asesi->relasi_jadwal_uji_kompetensi->relasi_pelaksanaan_ujian->waktu_mulai)->format('H:m:s')}}-{{Carbon\Carbon::parse($data_umpan_balik_asesi->relasi_jadwal_uji_kompetensi->relasi_pelaksanaan_ujian->waktu_selesai)->format('H:m:s')}}</h6>
                            </td>
                        </tr>

                  </tbody>
              </table>

              <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <td rowspan="2" style="width: 20%">
                          <h6 style="margin: 0; font-weight: bold;">Komponen</h6>
                        </td>
                        <td colspan="2" style="width: 2%">
                          <h6 style="margin: 0; font-weight: bold;">Hasil</h6>
                        </td>
                        <td rowspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: bold;">Catatan/Komentar Asesi</h6>
                        </td>
                      </tr>
                    <tr>
                      <td style="width: 2%">
                        <h6 style="margin: 0; font-weight: bold;">Ya</h6>
                      </td>
                      <td style="width: 2%">
                        <h6 style="margin: 0; font-weight: bold;">Tidak</h6>
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($umpan_balik_komponen as $data_umpan_balik_komponen)
                    @php
                        $hasil_umpan_balik = \App\Models\HasilUmpanBalik::where('jadwal_uji_kompetensi_id', $data_umpan_balik_asesi->jadwal_uji_kompetensi_id)
                            ->where('umpan_balik_komponen_id', $data_umpan_balik_komponen->id)
                            ->where('user_asesi_id', $data_umpan_balik_asesi->user_asesi_id)->first();
                    @endphp
                        <tr>
                            <td style="padding-top: 0.4%;padding-bottom: 0%;">
                                {{$data_umpan_balik_komponen->komponen}}
                            </td>
                            @isset($hasil_umpan_balik->hasil)
                                @if($hasil_umpan_balik->hasil == 1)
                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                    <td></td>
                                @elseif($hasil_umpan_balik->hasil == 0)
                                    <td></td>
                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                @endif
                            @else
                                <td>?</td>
                                <td>?</td>
                            @endisset
                            @isset($hasil_umpan_balik->catatan)
                            <td>
                                {{$hasil_umpan_balik->catatan}}
                            </td>
                            @else
                            <td>?</td>
                            @endisset
                        </tr>
                    @endforeach
                  </tbody>
              </table>
            
            
            
              {{-- <a href="{{route('admin.CetakAsesmenMandiri', ['jurusan_id'=>$jurusan_id, 'user_asesi_id'=>$user_asesi_id])}}" target="print_frame" class="btn btn-sm btn-link"><i class="la la-print"></i> Print</a> --}}
             

          </div>
      </div>
    </section>
  </div>
  @endforeach
  <div class="card page-content">
    <a href="{{route('admin.CetakRekapanUmpanBalik', $user_asesi_id)}}" target="_blank" class="btn btn-sm btn-primary rounded-pill"><i class="fa fa-print fa-lg"></i>  Simpan ke PDF</a>
  </div>
@endsection