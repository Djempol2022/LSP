<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PDF</title>

  <style>
    .page-break {
      page-break-after: always;
    }
  </style>

</head>

<html lang="en">


<body style="font-family: sans-serif">
  <table>
    <tr>
      <td>@include('layout.image-base64.img-logo-lsp')</td>
      <td>
        <h1 style="margin: 0px; color: skyblue; font-size: 24px;">Lembaga Sertifikasi Profesi</h1>
        <h2 style="margin: 0px; font-family: serif; font-weight: bolder; color: grey; font-size: 24px;">SMK Negeri 1
          Sintang</h2>
        <h5 style="margin: 0px; color: grey; font-weight: lighter; font-size: 15px;">Jalan Raya Sintang - Pontianak KM.8
          Sintang</h5>
        <h5 style="margin: 0px; color: grey; font-weight: lighter; font-size: 15px;">Telp.: (0565)21377, Fax:
          (0565)21377</h5>
      </td>
      <td>@include('layout.image-base64.img-logo-bnsp')</td>
    </tr>
  </table>
  <hr />

  <div style="text-align: center; display: flex; flex-direction: column; font-size: 15px;">
    <h4 style="margin-bottom: -20px; margin-top: 0px;">BERITA ACARA
    </h4>
    <h4 style="margin-bottom: -5px;">VERIFIKASI TEMPAT UJI KOMPETENSI</h4>
  </div>

  <div style="width: 90%; margin: 0 auto">
    <div style="margin-top: 10px">
      <p>Pada hari ini ............................ tanggal
        .................................
        Bulan ................................... tahun
        ..................................... di SMK
        .................................................................................
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

    <div class="mt-5">
      <p>* coret yang tidak perlu</p>
    </div>

    <div style="text-align: right; margin-top: 0.5rem;">
      <p style="font-size: 10px; margin-bottom: -10px; font-style: italic;">Jalan Raya
        Sintang-Pontianak Km.8 Sintang</p>
      <p style="font-size: 10px; margin-bottom: 0; font-style: italic;">Telp (0565)21377 e-mail :
        lspsmkn1stg@gmail.com</p>
    </div>
  </div>


</body>

</html>
