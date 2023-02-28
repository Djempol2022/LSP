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
  </style>

</head>

<html lang="en">


<body style="font-family: sans-serif">

  <header>
    @include('layout.header-berkas-pdf')
  </header>

  <main>
    <div style="page-break-after: never;">
      <div class="text-center d-flex flex-column"
        style="text-align: center; display: flex; flex-direction: column; font-size: 15px;">
        <h4 style="margin-bottom: -20px; margin-top: 0px;">DAFTAR TEMPAT UJI KOMPETENSI (TUK) TERVERIFIKASI</h4>
        <h4>LSP SMK NEGERI 1 SINTANG </h4>
      </div>
      <div>
        <table style="margin: 0 auto; font-size: 15px; width: 100%" cellpadding='5' cellspacing='0'
          border="1px solid black">
          <thead>
            <tr style="text-align: center; ">
              <th style="width: 3%">NO</th>
              <th style="width: 33%">NAMA TUK</th>
              <th style="width: 37%">NAMA SKEMA SERTIFIKASI</th>
              <th style="width: 27%">PENANGGUNG JAWAB TUK</th>
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
                      {{ $daftar_tuk->tanggal_ditetapkan->isoFormat('D MMMM Y') }}</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="text-align: left;">
                      <div style="margin-left: 231px">
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
    </div>
  </main>
</body>

</html>
