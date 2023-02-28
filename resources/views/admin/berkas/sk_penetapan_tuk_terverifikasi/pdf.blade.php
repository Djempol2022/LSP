<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PDF</title>
  {{-- <link rel="stylesheet" href="{{ url('css/pdf.css') }}"> --}}
  <style>
    /* pdf */
    /* @font-face {
      font-family: 'Berlin Sans FB Demi Bold';
      font-style: normal;
      font-weight: bold;
      src: url("../../fonts/vendor/berkas-font/berlin-sans-fb-demi-bold/berlin-sans-fb-demi-bold.ttf") format('truetype');
    } */

    /* @font-face {
      font-family: 'Berlin-Sans-FB-Demi-Bold';
      src: url({{ storage_path('fonts/berlin-sans-fb-demi-bold.ttf') }}) format("truetype");
      font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
      font-style: normal; // use the matching font-style here
    } */

    /* end of pdf */

    /* .page-break {
      page-break-after: always;
    } */
  </style>
  <style>
    /** Define the margins of your page **/
    @page {
      margin: 150px 60px;
    }

    header {
      position: fixed;
      top: -150px;
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
    <div style="page-break-after: always;">
      <div class="text-center d-flex flex-column" style="text-align: center; font-size: 15px;">
        <h4 style="margin-bottom: -20px; margin-top: 0px;">SURAT
          KEPUTUSAN</h4>
        <h4 style="margin-bottom: -20px">KETUA LSP SMK NEGERI 1 SINTANG</h4>
        <h4 style="margin-bottom: -16px">Nomor : {{ $sk_penetapan_tuk->no_sk }}</h4>
        <h4 style="font-style: italic; font-weight: lighter; margin-bottom: -16px">Tentang</h4>
        <h4 style="margin-bottom: -17px">PENEMPATAN TEMPAT UJI KOMPETENSI (TUK) TERVERIFIKASI</h4>
      </div>
      <div>
        <div>
          <table>
            <tbody>
              <tr>
                <td colspan="4" style="text-align: center; font-size: 15px;">
                  <h4 style="margin-bottom: 0px">Ketua LSP</h4>
                </td>
              </tr>
              <tr style="height: 60px; font-size: 13px;">
                <td style="width: 18%; vertical-align: top;">MENIMBANG</td>
                <td style="width: 2%; vertical-align: top;">:</td>
                <td style="width: 80%; vertical-align: top; text-align: justify;" colspan="2">Untuk menjamin
                  Sertifikasi
                  Kompetensi Keahlian
                  maka
                  harus didukung
                  oleh Kelayakan
                  Tempat Uji
                  Kompetensi yang selalu siap pakai dan sesuai dengan keahlian yang akan diujikan.</td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 18%; vertical-align: top;" rowspan="9">MENGINGAT</td>
                <td style="width: 2%; vertical-align: top;" rowspan="9">:</td>
                <td style="width: 3%; vertical-align: top;">1.</td>
                <td style="width: 77%; vertical-align: top; text-align: justify;">UU No. 13 tahun 2003 tentang
                  ketenagakerjaan pasal 18 bahwa
                  Pengakuan
                  Kompetensi
                  Kerja dilakukan
                  melalui sertifikasi kompetensi kerja oleh BNSP yang indipenden;
                </td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 3%; vertical-align: top;">2.</td>
                <td style="width: 77%; vertical-align: top; text-align: justify;">UU No. 20 tahun 2003 tentang Sistim
                  Pendidikan Nasional;
                </td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 3%; vertical-align: top;">3.</td>
                <td style="width: 77%; vertical-align: top; text-align: justify;">UU No. 12 tahun 2012 tentang
                  Pendidikan Tinggi bahwa
                  sertifikat
                  kompetensi/
                  profesi diberikan
                  kepada lulusan pendidikan tinggi vokasi/profesi;</td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 3%; vertical-align: top;">4.</td>
                <td style="width: 77%; vertical-align: top; text-align: justify;">Peraturan Pemerintah No. 23 tahun 2004
                  tentang Badan
                  Nasional
                  Sertifikasi
                  Profesi
                  bahwa BNSP
                  mempunyai tugas melaksanakan sertifikasi kompetensi kerja (pasal 3);</td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 3%; vertical-align: top;">5.</td>
                <td style="width: 77%; vertical-align: top; text-align: justify;">Peraturan Pemerintah No. 31 tahun 2006
                  tentang Sistem
                  Pelatihan Kerja
                  Nasional
                  (SISLATKERNAS)
                  bahwa sertifikasi kompetensi kerja oleh LSP terlisensi BNSP;</td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 3%; vertical-align: top;">6.</td>
                <td style="width: 77%; vertical-align: top; text-align: justify;">Peraturan Pemerintah No. 31 tahun 2006
                  tentang Sistem
                  Pelatihan Kerja
                  Nasional
                  (SISLATKERNAS)
                  bahwa sertifikasi kompetensi kerja oleh LSP terlisensi BNSP;</td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 3%; vertical-align: top;">7.</td>
                <td style="width: 77%; vertical-align: top; text-align: justify;">ISO 17024 tahun 2012 Conformity
                  Assisment General
                  Requirements for
                  Bodies
                  Operating
                  Certification System of Persons.</td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 3%; vertical-align: top;">8.</td>
                <td style="width: 77%; vertical-align: top; text-align: justify;">Panduan BNSP 206 tentang persyaratan
                  Tempat Uji Kompetensi
                </td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 3%; vertical-align: top;">9.</td>
                <td style="width: 77%; vertical-align: top; text-align: justify;">Hasil Verifikasi Kelayakan Tempat Uji
                  Kompetensi</td>
              </tr>
              <tr>
                <td colspan="4" style="text-align: center; font-size: 13px;">
                  <h4 style="margin-bottom: 0px">MEMUTUSKAN</h4>
                </td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 18%; vertical-align: top;">MENETAPKAN</td>
                <td style="width: 2%; vertical-align: top;">:</td>
                <td style="width: 80%; vertical-align: top;" colspan="2"></td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 18%; vertical-align: top;">Pertama</td>
                <td style="width: 2%; vertical-align: top;">:</td>
                <td style="width: 80%; vertical-align: top; text-align: justify;" colspan="2">Menetapkan bengkel
                  praktik sebagai TUK
                  sesuai
                  dengan
                  Kompetensi
                  dan skema sertifikasi yang telah ditetapkan sebagaimana dalam lampiran surat keputusan ini.</td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 18%; vertical-align: top;">Kedua</td>
                <td style="width: 2%; vertical-align: top;">:</td>
                <td style="width: 80%; vertical-align: top; text-align: justify;" colspan="2">Tempat Uji Kompetensi
                  telah terverifikasi
                  dengan
                  memenuhi syarat
                  sesuai kebutuhan skema sertifikasi pada kompetensinya sehingga dapat menjamin terlaksananya
                  Sertifikasi Profesi Kompetensi berdasarkan skema sertifikasi yang akan diujikan.</td>
              </tr>
              <tr style="font-size: 13px;">
                <td style="width: 18%; vertical-align: top;">Ketiga</td>
                <td style="width: 2%; vertical-align: top;">:</td>
                <td style="width: 80%; vertical-align: top; text-align: justify;" colspan="2">Surat Keputusan ini
                  berlaku sejak tanggal
                  ditetapkan
                  dan apabila
                  terdapat kesalahan dalam penetapan ini akan diadakan perubahan seperlunya.</td>
              </tr>
              <tr style="font-size: 13px;">
                <td></td>
                <td></td>
                <td colspan="2">
                  <div style="text-align: right; margin-right: 50px">
                    <table style="width: 100%">
                      <tr style="text-align: right">
                        <td>Ditetapkan di</td>
                        <td style="width: 5%">:</td>
                        <td style="width: 30%; text-align: left;">{{ $sk_penetapan_tuk->tempat_ditetapkan }}
                        </td>
                      </tr>
                      <tr style="text-align: right">
                        <td>Pada tanggal</td>
                        <td style="width: 5%">:</td>
                        <td style="width: 30%; text-align: left;">
                          {{ $sk_penetapan_tuk->tanggal_ditetapkan->isoFormat('D MMMM Y') }}</td>
                      </tr>
                      <tr>
                        <td colspan="3" style="text-align: left;">
                          <div style="margin-left: 232px">
                            <div>
                              <span>{{ $sk_penetapan_tuk->jabatan_bttd }}</span>
                            </div>
                            <div style="height: 90px"><img src="{{ $sk_penetapan_tuk->ttd }}" alt="ttd"
                                style="width: 140px; margin-left: -10px; margin-top: -2px">
                            </div>
                            <div>
                              <span>{{ $sk_penetapan_tuk->nama_bttd }}</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div style="page-break-after: never;">
      <table>
        <tbody style="font-size: 13px">
          <tr>
            <td colspan="3">
              <h6 style="margin: 0; font-weight: lighter;">Lampiran SK</h6>
              </h6>
            </td>
          </tr>
          <tr>
            <td style="width: 8%">
              <h6 style="margin: 0; font-weight: lighter;">Nomor</h6>
            </td>
            <td style="width: 2%">
              <h6 style="margin: 0; font-weight: lighter;">:</h6>
            </td>
            <td style="width: 90%" class="text-left">
              <h6 style="margin: 0; font-weight: lighter;">{{ $sk_penetapan_tuk->no_sk }}</h6>
            </td>
          </tr>
          <tr>
            <td>
              <h6 style="margin: 0; font-weight: lighter;">Tanggal</h6>
            </td>
            <td>
              <h6 style="margin: 0; font-weight: lighter;">:</h6>
            </td>
            <td>
              <h6 style="margin: 0; font-weight: lighter;">
                {{ $sk_penetapan_tuk->tanggal_ditetapkan->isoFormat('D MMMM Y') }}
              </h6>
            </td>
          </tr>
        </tbody>
      </table>
      <div>
        <div>
          <h6 style="text-align: center; margin: 0; font-size: 16px; margin-top: 10px">PENEMPATAN TEMPAT UJI KOMPETENSI
            (TUK) TERVERIFIKASI
          </h6>
          <h6 style="text-align: center; margin: 0; font-size: 16px; margin-bottom: 10px">LSP SMK NEGERI 1 SINTANG</h6>
          <table style="margin: 0 auto; font-size: 15px; width: 100%" cellpadding='5' cellspacing='0'
            border="1px solid black">
            <thead>
              <tr style="text-align: center; ">
                <th>NO</th>
                <th>NAMA TUK</th>
                <th>NAMA SKEMA SERTIFIKASI</th>
                <th>TEMPAT</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sk_penetapan_tuk->relasi_sk_penetapan_tuk_child as $item)
                <tr>
                  <td style="text-align: center">{{ $loop->iteration }}</td>
                  <td>{{ $item->relasi_nama_tuk->nama_tuk }}</td>
                  <td>{{ $item->relasi_skema_sertifikasi->judul_skema_sertifikasi }}</td>
                  <td>{{ $item->tempat }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <table style="font-size: 13px; margin-top: 10px; width: 100%">
            <tr>
              <td style="width: 65px"></td>
              <td style="width: 65px"></td>
              <td>
                <div style="text-align: right; margin-right: 50px">
                  <table style="width: 100%">
                    <tr style="text-align: right">
                      <td>Ditetapkan di</td>
                      <td style="width: 5%">:</td>
                      <td style="width: 30%; text-align: left;">{{ $sk_penetapan_tuk->tempat_ditetapkan }}
                      </td>
                    </tr>
                    <tr style="text-align: right">
                      <td>Pada tanggal</td>
                      <td style="width: 5%">:</td>
                      <td style="width: 30%; text-align: left;">
                        {{ $sk_penetapan_tuk->tanggal_ditetapkan->isoFormat('D MMMM Y') }}</td>
                    </tr>
                    <tr>
                      <td colspan="3" style="text-align: left;">
                        <div style="margin-left: 232px">
                          <div>
                            <span>{{ $sk_penetapan_tuk->jabatan_bttd }}</span>
                          </div>
                          <div style="height: 90px"><img src="{{ $sk_penetapan_tuk->ttd }}" alt="ttd"
                              style="width: 140px; margin-left: -10px; margin-top: -2px">
                          </div>
                          <div>
                            <span>{{ $sk_penetapan_tuk->nama_bttd }}</span>
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
    </div>
  </main>
</body>

</html>
