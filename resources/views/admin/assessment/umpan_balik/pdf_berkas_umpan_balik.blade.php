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
          /* break-inside: avoid; */
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
          {{-- LEMBAR 1 --}}
  <div style="padding: 2%; padding-top:0%">   
    @foreach ($umpan_balik_asesi as $data_umpan_balik_asesi)
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
      <h4 style="margin-top: 10px;">FR.AK.03. UMPAN BALIK DAN CATATAN ASESMEN
      </h4>
  </div>

    <br>
      <table border="1px solid black" style="font-size: 13px; width: 100%; margin-bottom:2%;" cellspacing=0 cellpadding=5>
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

      <table border="1px solid black" style="font-size: 13px; width: 100%; margin-bottom:2%;" cellspacing=0 cellpadding=4>
        <thead style="text-align: center">
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
                  <td>
                      <h6 style="margin: 0%; padding:0%; font-weight: lighter;">{{$data_umpan_balik_komponen->komponen}}</h6>
                  </td>
                  @isset($hasil_umpan_balik->hasil)
                    @if($hasil_umpan_balik->hasil == 1)
                    <td>
                      <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔</h6>
                    </td>
                    <td></td>
                    @elseif($hasil_umpan_balik->hasil == 0)
                        <td></td>
                        <td>                        
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔</h6>
                        </td>
                    @endif
                  @else
                      <td>?</td>
                      <td>?</td>
                  @endisset
                  @isset($hasil_umpan_balik->catatan)
                  <td>
                    <h6 style="margin: 0%; padding:0%; font-weight: lighter;">{{$hasil_umpan_balik->catatan}}</h6>
                  </td>
                  @else
                  <td>?</td>
                  @endisset
              </tr>
                @endforeach
          </tbody>
      </table>
      <div class="page-break"></div>
    @endforeach
  </div>
</body>

</html>
