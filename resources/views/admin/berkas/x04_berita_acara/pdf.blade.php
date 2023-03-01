<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PDF</title>

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

    footer {
      position: fixed;
      bottom: -60px;
      left: 0px;
      right: 0px;
      height: 50px;
    }
  </style>

</head>

<html lang="en">


<body style="font-family: sans-serif">
  <header>
    @include('layout.header-bnsp-berkas-pdf')
  </header>

  <footer>
    <div class="mt-5">
      <p>* coret yang tidak perlu</p>
    </div>

    @include('layout.footer-berkas')
  </footer>

  <main>
    <div style="page-break-after: never">
      <div style="text-align: center; display: flex; flex-direction: column; font-size: 15px;">
        <h4 style="margin-bottom: -20px; margin-top: 0px;">BERITA ACARA
        </h4>
        <h4 style="margin-bottom: -5px;">VERIFIKASI TEMPAT UJI KOMPETENSI</h4>
      </div>

      <div style="width: 90%; margin: 0 auto">
        <div style="margin-top: 10px">
          <p>Pada hari ini ............................ tanggal
            ..............................
            Bulan ................................ tahun
            ..................................... di SMK
            ...........................................................................
          </p>
        </div>

        <div style="margin-top: 10px">
          <ol style="list-style: lower-alpha; padding-left: 20px">
            <li>Telah dilaksanakan verifikasi calon Tempat Uji Kompetensi untuk pelaksanaan Uji Kompetensi. <br />
              <table style="width: 100%">
                <tr>
                  <td style="width: 250px; vertical-align: top;">Kompetensi/Paket Keahlian</td>
                  <td style="width: 3px; vertical-align: top;">:</td>
                  <td style="vertical-align: top;">
                    {{ $x04_berita_acara->relasi_skema_sertifikasi->relasi_jurusan->jurusan }}</td>
                </tr>
                <tr>
                  <td style="vertical-align: top;">Paket Ujian</td>
                  <td style="vertical-align: top;">:</td>
                  <td style="vertical-align: top;">
                    {{ $x04_berita_acara->relasi_skema_sertifikasi->judul_skema_sertifikasi }}</td>
                </tr>
                <tr>
                  <td style="vertical-align: top;">Rencana Pelaksanaan</td>
                  <td style="vertical-align: top;">:</td>
                  <td style="vertical-align: top;">.....................................................................
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top;">Rekomendasi</td>
                  <td style="vertical-align: top;">:</td>
                  <td style="font-weight: bold; vertical-align: top;">Sangat layak/layak/belum layak *</td>
                </tr>
              </table>
            </li>
            <li>
              Catatan selama pelaksanaan verifikasi <br />
              .................................................................................................................................<br />
              .................................................................................................................................<br />
              .................................................................................................................................<br />
              .................................................................................................................................<br />
              .................................................................................................................................<br />
              .................................................................................................................................<br />
              .................................................................................................................................<br />
              .................................................................................................................................<br />
              .................................................................................................................................<br />
              .................................................................................................................................<br />
              <br />
              <span style="margin-left: -18px;">Berita acara ini dibuat sesungguhnya dengan instrument verifikasi
                terlampir.</span>
            </li>
          </ol>
        </div>

        <div>
          <table style="width: 100%;">
            <tr>
              <td colspan="2">Yang melakukan verifikasi</td>
            </tr>
            <tr>
              <td style="width: 50%">{{ $x04_berita_acara->jabatan_bttd }}</td>
              <td style="width: 50%; text-align: right">Perwakilan Tempat Uji Kompetensi</td>
            </tr>
            <tr>
              <td style="height: 90px">
                <img src="{{ $x04_berita_acara->ttd }}" style="width: 140px" alt="ttd">
              </td>
              <td>

              </td>
            </tr>
            <tr>
              <td>({{ $x04_berita_acara->nama_bttd }})</td>
              <td style="text-align: right">
                (.......................................................)</td>
            </tr>
            <tr>
              <td>NIP.{{ $x04_berita_acara->nip_bttd }}</td>
              <td style="text-align: right">
                NIP..................................................</td>
            </tr>
          </table>
        </div>


      </div>
    </div>
  </main>


</body>

</html>
