<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PDF</title>
  <style>
    /** Define the margins of your page **/
    @page {
      margin: 180px 60px;
    }

    header {
      position: fixed;
      top: -170px;
      left: 0px;
      right: 0px;
      height: 50px;
    }
  </style>

</head>

<html lang="en">


<body style="font-family: sans-serif">

  <header>
    @include('layout.header-berkas-pdf')
  </header>

  <main>
    <div style="page-break-after: never;">
      <div class="text-center d-flex flex-column" style="text-align: center; font-size: 15px;">
        <h2 style="font-weight: bolder; margin-bottom: -20px; margin-top: 0px;">HASIL VERIFIKASI TEMPAT UJI KOMPETENSI (
          TUK )</h2>
        <h2 style="font-weight: bolder; margin-bottom: -20px;">
          "{{ $hasil_verifikasi_tuk->relasi_skema_sertifikasi->relasi_jurusan->jurusan }}"
        </h2>
        <h2 style="font-weight: lighter; margin-bottom: -20px">
          {{ $hasil_verifikasi_tuk->relasi_skema_sertifikasi->judul_skema_sertifikasi }}
        </h2>
      </div>
      <div style="margin-top: 20px">
        <h4 style="font-weight: bolder; margin-left: 40px; margin-bottom: 0px">A. SARANA DAN PRASARANA</h4>
        <table style="margin: 0 auto; font-size: 15px; width: 100%; table-layout:fixed;" cellpadding='5' cellspacing='0'
          border="1px solid black">
          <thead>
            <tr style="text-align: center">
              <th rowspan="2">No.</th>
              <th rowspan="2">Sarana dan Prasarana</th>
              <th rowspan="2">Ada</th>
              <th rowspan="2">Tidak Ada</th>
              <th colspan="2">Kondisi</th>
            </tr>
            <tr>
              <th>Sesuai</th>
              <th>Tidak Sesuai</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($hasil_verifikasi_tuk->relasi_sarana_prasarana as $item_sarana_prasarana)
              <tr>
                <td style="text-align: center; width: 7%;">
                  {{ $loop->iteration }}</td>
                <td style="width: 53%">{{ $item_sarana_prasarana->sarana_prasarana }}
                </td>
                @if (isset($item_sarana_prasarana->status))
                  <td style="text-align: center">
                    @if ($item_sarana_prasarana->status == 1)
                      @include('layout.image-base64.img-check-mark')
                    @endif
                  </td>
                  <td style="text-align: center">
                    @if ($item_sarana_prasarana->status == 0)
                      @include('layout.image-base64.img-check-mark')
                    @endif
                  </td>
                @else
                  <td style="text-align: center; width: 10%;"></td>
                  <td style="text-align: center; width: 10%;"></td>
                @endif
                @if (isset($item_sarana_prasarana->kondisi))
                  <td style="text-align: center">
                    @if ($item_sarana_prasarana->kondisi == 1)
                      @include('layout.image-base64.img-check-mark')
                    @endif
                  </td>
                  <td style="text-align: center">
                    @if ($item_sarana_prasarana->kondisi == 0)
                      @include('layout.image-base64.img-check-mark')
                    @endif
                  </td>
                @else
                  <td style="text-align: center; width: 10%;"></td>
                  <td style="text-align: center; width: 10%;"></td>
                @endif
              </tr>
              @if ($item_sarana_prasarana->relasi_sarana_prasarana_sub)
                @foreach ($item_sarana_prasarana->relasi_sarana_prasarana_sub as $item_sarana_prasarana_sub)
                  <tr>
                    <td></td>
                    <td>
                      {{ chr(96 + $loop->iteration) }}. {{ $item_sarana_prasarana_sub->sarana_prasarana_sub }} <br />
                      @if ($item_sarana_prasarana_sub->relasi_sarana_prasarana_sub2)
                        <ol style="list-style: disc; margin: 0">
                          @foreach ($item_sarana_prasarana_sub->relasi_sarana_prasarana_sub2 as $item_sarana_prasarana_sub2)
                            <li>{{ $item_sarana_prasarana_sub2->sarana_prasarana_sub_2 }}</li>
                          @endforeach
                        </ol>
                      @endif
                    </td>
                    @if (isset($item_sarana_prasarana_sub->status))
                      <td style="text-align: center">
                        @if ($item_sarana_prasarana_sub->status == 1)
                          @include('layout.image-base64.img-check-mark')
                        @endif
                      </td>
                      <td style="text-align: center">
                        @if ($item_sarana_prasarana_sub->status == 0)
                          @include('layout.image-base64.img-check-mark')
                        @endif
                      </td>
                    @else
                      <td style="text-align: center; width: 10%;"></td>
                      <td style="text-align: center; width: 10%;"></td>
                    @endif
                    @if (isset($item_sarana_prasarana_sub->kondisi))
                      <td style="text-align: center">
                        @if ($item_sarana_prasarana_sub->kondisi == 1)
                          @include('layout.image-base64.img-check-mark')
                        @endif
                      </td>
                      <td style="text-align: center">
                        @if ($item_sarana_prasarana_sub->kondisi == 0)
                          @include('layout.image-base64.img-check-mark')
                        @endif
                      </td>
                    @else
                      <td style="text-align: center; width: 10%;"></td>
                      <td style="text-align: center; width: 10%;"></td>
                    @endif
                  </tr>
                @endforeach
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div style="margin-top: 20px">
        <h4 style="font-weight: bolder; margin-left: 20px; margin-bottom: 0px">B. PENGUJI</h4>
        <table style="margin: 0 auto; font-size: 15px; width: 100%; table-layout:fixed;" cellpadding='5' cellspacing='0'
          border="1px solid black">
          <thead>
            <tr style="text-align: center">
              <th style="width: 5%">No</th>
              <th style="width: 25%">Aspek Kompetensi</th>
              <th style="width: 55%">Standar</th>
              <th colspan="2" style="width: 15%">Kondisi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align: center">1.</td>
              <td>Pendidikan</td>
              <td>{{ $hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[0]->standar }}</td>
              @if (isset($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[0]->kondisi))
                <td style="text-align: center">
                  @if ($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[0]->kondisi == 1)
                    @include('layout.image-base64.img-check-mark')
                  @endif
                </td>
                <td style="text-align: center">
                  @if ($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[0]->kondisi == 0)
                    @include('layout.image-base64.img-check-mark')
                  @endif
                </td>
              @else
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
              @endif
            </tr>
            <tr>
              <td style="text-align: center">2.</td>
              <td>Pelatihan</td>
              <td>{{ $hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[1]->standar }}</td>
              @if (isset($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[1]->kondisi))
                <td style="text-align: center">
                  @if ($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[1]->kondisi == 1)
                    @include('layout.image-base64.img-check-mark')
                  @endif
                </td>
                <td style="text-align: center">
                  @if ($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[1]->kondisi == 0)
                    @include('layout.image-base64.img-check-mark')
                  @endif
                </td>
              @else
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
              @endif
            </tr>
            <tr>
              <td style="text-align: center">3.</td>
              <td>Pengalaman</td>
              <td>{{ $hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[2]->standar }}</td>
              @if (isset($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[2]->kondisi))
                <td style="text-align: center">
                  @if ($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[2]->kondisi == 1)
                    @include('layout.image-base64.img-check-mark')
                  @endif
                </td>
                <td style="text-align: center">
                  @if ($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[2]->kondisi == 0)
                    @include('layout.image-base64.img-check-mark')
                  @endif
                </td>
              @else
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
              @endif
            </tr>
            <tr>
              <td style="text-align: center">4.</td>
              <td>Ketrampilan</td>
              <td>{{ $hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[3]->standar }}</td>
              @if (isset($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[3]->kondisi))
                <td style="text-align: center">
                  @if ($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[3]->kondisi == 1)
                    @include('layout.image-base64.img-check-mark')
                  @endif
                </td>
                <td style="text-align: center">
                  @if ($hasil_verifikasi_tuk->relasi_penguji_hasil_verifikasi[3]->kondisi == 0)
                    @include('layout.image-base64.img-check-mark')
                  @endif
                </td>
              @else
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
              @endif
            </tr>

          </tbody>
        </table>
      </div>
      <div style="margin-top: 30px;">
        <table style="width: 80%; table-layout:fixed; margin-left: -18px">
          <tr>
            <th style="vertical-align: top; width: 20%;">Catatan :</th>
            <td style="width: 90%;">
              {{ $hasil_verifikasi_tuk->catatan }}
            </td>
          </tr>
        </table>
      </div>
      <div>
        <h4 style="font-weight: bolder; margin-bottom: -10px">Kesimpulan Verifikasi: <span
            style="font-weight: lighter">(* pilih salah
            satu)</span></h4>
        <p>* Sesuai / Belum sesuai dengan persyaratan tempat uji kompetensi</p>
      </div>
      <div style="margin-top: 20px;">
        <table style="font-size: 13px; margin-top: 10px; width: 100%">
          <tr>
            <td style="width: 65px"></td>
            <td style="width: 65px"></td>
            <td>
              <div style="text-align: right; margin-right: 50px">
                <table style="width: 100%">
                  <tr>
                    <td colspan="3" style="text-align: left;">
                      <div style="margin-left: 231px">
                        <div>
                          <span>{{ $hasil_verifikasi_tuk->tempat_ditetapkan }},
                            {{ $hasil_verifikasi_tuk->tanggal_ditetapkan->isoFormat('DD MMMM Y') }}</span>
                        </div>
                        <div style="margin-left: 40px">
                          Verifikator
                        </div>
                        <div style="height: 105px"><img src="{{ $hasil_verifikasi_tuk->ttd }}" alt="ttd"
                            style="width: 120px; margin-left: 10px; margin-top: -2px">
                          <div>
                            <span>{{ $hasil_verifikasi_tuk->nama_bttd }}</span>
                          </div>
                        </div>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </main>
</body>

</html>
