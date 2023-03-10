<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF</title>

    <style>
      table thead{
          display: table-row-group;
        }
        td{
          /* border-style: solid;
          border-width: 2px; */
          break-inside: avoid;
        }
        .page-break {
          page-break-after: always;
        }

        /* table{
          page-break-inside: auto;
        } */
        tr{
          /* page-break-before: always!important; */
          /* page-break-inside: avoid!important; */
          break-inside: avoid;
          /* page-break-after: auto!important; */
        }
        /* thead{
          display: table-header-group;
        } */
    </style>

</head>

<html lang="en">


<body style="font-family: sans-serif">
    {{-- lembar 1 --}}
    <table>
        <tr>
            <td>@include('layout.image-base64.img-logo-lsp')</td>
            <td>
                <h1 style="margin: 0px; color: skyblue; font-size: 24px;">Lembaga Sertifikasi Profesi</h1>
                <h2 style="margin: 0px; font-family: serif; font-weight: bolder; color: grey; font-size: 24px;">SMK
                    Negeri 1
                    Sintang</h2>
                <h5 style="margin: 0px; color: grey; font-weight: lighter; font-size: 15px;">Jalan Raya Sintang -
                    Pontianak KM.8
                    Sintang</h5>
                <h5 style="margin: 0px; color: grey; font-weight: lighter; font-size: 15px;">Telp.: (0565)21377, Fax:
                    (0565)21377</h5>
            </td>
            <td>@include('layout.image-base64.img-logo-bnsp')</td>
        </tr>
    </table>
    <hr />

    <div style="text-align: center; font-size: 15px;">
        <h4 style="margin-top: 10px;">FR.APL.02. ASESMEN MANDIRI
        </h4>
    </div>
    <div style="padding: 5%; padding-top:0% ">
    {{-- LEMBAR 1 --}}
    <table border="1" style="font-size: 13px; width: 100%; margin-bottom:2%" cellspacing=0 cellpadding=5>
        <tbody style="font-size: 13px">
              <tr>
                <td rowspan="2" style="width: 10%">
                  <h6 style="margin: 0; font-weight: bold;">Skema Sertifikasi (KKNI/Okupasi/Klaster)</h6>
                </td>
                <td style="width: 10%">
                  <h6 style="margin: 0; font-weight: bold;">Judul</h6>
                </td>
                <td style="width: 2%">
                  <h6 style="margin: 0; font-weight: bold;">:</h6>
                </td>
                <td style="width: 88%">
                    <h6 style="margin: 0; font-weight: bold;">{{$sertifikasi->relasi_unit_kompetensi->relasi_skema_sertifikasi->judul_skema_sertifikasi}}</h6>
                </td>
              </tr>
              <tr>
                <td style="width: 10%">
                    <h6 style="margin: 0; font-weight: bold;">Nomor</h6>
                </td>
                <td style="width: 2%">
                    <h6 style="margin: 0; font-weight: bold;">:</h6>
                </td>
                <td style="width: 88%">
                    <h6 style="margin: 0; font-weight: bold;">{{$sertifikasi->relasi_unit_kompetensi->relasi_skema_sertifikasi->nomor_skema_sertifikasi}}</h6>
                </td>
              </tr>
        </tbody>
    </table>
    <table border="1px;" style="font-size: 13px; width: 100%; margin-bottom:2%;" cellspacing=0 cellpadding=5>
      <thead>
        <tr>
          <td style="background-color: #ffc6a5; width: 7%">
            <h6 style="margin: 0; font-weight: bold;">PANDUAN ASESMEN MANDIRI</h6>
          </td>
        </tr>
      </thead>
      <tbody style="font-size: 13px">
            <tr>
              <td>
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
                <table border="1" style="font-size: 13px; width: 100%; margin-bottom:2% border:1px solid;" cellspacing=0 cellpadding=3>
                  <thead>
                    <tr>
                      <td style="width: 7%">
                        <h6 style="margin: 0; font-weight: bold;">Unit Kompetensi</h6>
                      </td>
                      <td colspan="3" style="width: 20%">
                        <h6 style="margin: 0; font-weight: bold;">{{$data_unit_kompetensi->judul_unit}}</h6>
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
                          <td colspan="3" style="padding-top: 0.4%; padding-bottom: 0.2%;">
                            <h6 style="margin: 0%; padding:0%; font-weight: lighter;">{{$index+1}}. Elemen: {{ $data_unit_kompetensi_sub->judul_unit_kompetensi_sub }}</h6>
                            <h6 style="margin: 0%; padding:0%; padding-left:5%; font-weight: lighter;">Kriteria Unjuk Kerja:</h6>
                          </td>
                          <td rowspan="{{$dd+1}}">
                            <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                          </td>
                          {{-- <td>
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
                          @endphp
                          <tr>
                              <td>
                                <h6 style="margin: 0%; padding:0%; padding-left:5%;font-weight: lighter;">{{$index+1}}.{{$index2+1}} {{$isi->judul_unit_kompetensi_isi}}</h6>
                              </td>
                              @isset($data_status_kompeten_asesi->status)
                                  @if ($data_status_kompeten_asesi->status == 'kompeten')
                                    <td colspan="0">
                                      <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔</h6>
                                    </td>
                                    <td colspan="0">
                                    </td>
                                  @elseif($data_status_kompeten_asesi->status == 'belum kompeten')
                                    <td colspan="0">
                                    </td>
                                    <td colspan="0">
                                      <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔</h6>
                                    </td>
                                  @endif
                              @else
                                <td colspan="0">
                                  <h6 style="margin: 0; font-weight: lighter;">?</h6>
                                </td>
                                <td colspan="0">
                                  <h6 style="margin: 0; font-weight: lighter;">?</h6>
                                </td>
                              @endisset
                                {{-- <td>
                                  <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                              </td> --}}
                            </tr>
                            @empty
                          @endforelse
                    @endforeach
                  </tbody>
                </table>

                <table border="1px solid black" style="font-size: 13px; width: 100%; margin-bottom:2%; margin-top:2%" cellspacing=0 cellpadding=5>
                  <tbody style="font-size: 13px">
                    <tr>
                      <td style="width:30%"><h6>Nama Asesi : {{$data_asesmen_mandiri->relasi_user_asesi->nama_lengkap}}</h6></td>
                      <td style="width:30%"><h6>Tanggal : {{Carbon\Carbon::parse($data_asesmen_mandiri->tanggal_asesi)->format('d F Y')}}</h6></td>
                      <td style="width:30%"><h6>Tanda Tangan Asesi: </h6><img src="{{$data_asesmen_mandiri->ttd_asesi}}" style="width: 40%"></td>
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
                <div class="page-break"></div>
    @endforeach
    {{-- @foreach ($unit_kompetensi as $data_unit_kompetensi)
    @php
    $unit_kompetensi_sub = \App\Models\UnitKompetensiSub::with('relasi_unit_kompetensi.relasi_skema_sertifikasi')
        ->whereRelation('relasi_unit_kompetensi', 'unit_kompetensi_id', $data_unit_kompetensi->id)
        ->get();
    @endphp
      <table border="1" style="font-size: 13px; width: 100%; margin-bottom:2%" cellspacing=0 cellpadding=5>
        <thead>
          <tr>
            <td style="width: 7%">
              <h6 style="margin: 0; font-weight: lighter;">Unit Kompetensi</h6>
            </td>
            <td colspan="3" style="width: 20%">
              <h6 style="margin: 0; font-weight: lighter;">TIK.MM01.007.01
                Memilih dan Memakai Software Dan Hardware Untuk Multimedia</h6>
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
            <td style="width: 20%">
              <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
            </td>
          </tr>
        </thead>
        <tbody style="font-size: 13px" >
          @foreach ($unit_kompetensi_sub as $data_unit_kompetensi_sub)
            @php
            $unit_kompetensi_isi = \App\Models\UnitKompetensiIsi::with('relasi_unit_kompetensi_sub')
                ->whereRelation('relasi_unit_kompetensi_sub', 'unit_kompetensi_sub_id', $data_unit_kompetensi_sub->id)
                ->get();
            @endphp
              
              <tr>
                <td colspan="4">
                  <p>Elemen: {{ $data_unit_kompetensi_sub->judul_unit_kompetensi_sub }}</p>
                  <p>Kriteria Unjuk Kerja:</p>
                </td>
                @forelse ($unit_kompetensi_isi as $isi)
                @php
                    $data_status_kompeten_asesi = \App\Models\StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id',$isi->id)
                          ->where('user_asesi_id', $user_asesi_id)->first();
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
                    <td colspan="0" ></td>
                  </tr>
                  @empty
                  @endforelse
                </tr>
                <td>
                  <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                </td>
              
          @endforeach
        </tbody>
      </table>
    @endforeach --}}
    </div>

</body>

</html>
