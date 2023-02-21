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
    </tr>
  </table>
  <hr />

  <div class="text-center d-flex flex-column"
    style="text-align: center; display: flex; flex-direction: column; font-size: 15px;">
    <h4 style="margin-bottom: -20px; margin-top: 0px;">DAFTAR TEMPAT UJI KOMPETENSI (TUK) TERVERIFIKASI</h4>
    <h4>LSP SMK NEGERI 1 SINTANG </h4>
  </div>
  <div>
    <table style="margin: 0 auto; font-size: 15px" cellpadding='5' cellspacing='0' border="1px solid black">
      <thead>
        <tr style="text-align: center; ">
          <th>NO</th>
          <th>NAMA TUK</th>
          <th>NAMA SKEMA SERTIFIKASI</th>
          <th>PENANGGUNG JAWAB TUK</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($daftar_tuk->relasi_daftar_tuk_terverifikasi_child as $item)
          <tr>
            <td style="text-align: center;">{{ $loop->iteration }}</td>
            <td>{{ $item->relasi_nama_tuk->nama_tuk }}</td>
            <td>{{ $item->relasi_skema_sertifikasi->judul_skema_sertifikasi }}</td>
            <td>{{ $item->penanggung_jawab }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div>
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
                <td style="width: 30%; text-align: left;">{{ $daftar_tuk->tempat_ditetapkan }}
                </td>
              </tr>
              <tr style="text-align: right">
                <td>Pada tanggal</td>
                <td style="width: 5%">:</td>
                <td style="width: 30%; text-align: left;">
                  {{ $daftar_tuk->tanggal_ditetapkan->format('d F Y') }}</td>
              </tr>
              <tr>
                <td colspan="3" style="text-align: left;">
                  <div style="margin-left: 248px">
                    <div>
                      <span>{{ $daftar_tuk->jabatan_bttd }}</span>
                    </div>
                    <div style="height: 90px"><img src="{{ $daftar_tuk->ttd }}" alt="ttd"
                        style="width: 140px; margin-left: -10px; margin-top: -2px">
                    </div>
                    <div>
                      <span>{{ $daftar_tuk->nama_bttd }}</span>
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
</body>

</html>
