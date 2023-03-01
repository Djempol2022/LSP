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
    @include('layout.footer-berkas')
  </footer>

  <main>
    <div style="page-break-after: never">
      <div style="text-align: center; font-size: 15px;">
        <h4 style="margin-bottom: -20px; margin-top: 10px;">DAFTAR HADIR ASESOR
        </h4>
        <h4 style="margin-bottom: -5px;">RAPAT PLENO PELAKSANAAN UJI KOMPETENSI</h4>
      </div>

      <div style="width: 90%; margin: 20px auto 0 auto; position: relative;">
        <div style="margin-top: 20px; margin-left: 30px">
          <table style="width: 100%">
            <tr>
              <td style="width: 12%">Hari/Tanggal</td>
              <td style="width: 3%">:</td>
              <td style="width: 85%">{{ $df_hadir_asesor_pleno->tgl->isoFormat('dddd / D MMMM Y') }}</td>
            </tr>
            <tr>
              <td>Waktu</td>
              <td>:</td>
              <td>{{ $df_hadir_asesor_pleno->wkt_mulai->format('H:i') }} WIB - Selesai</td>
            </tr>
            <tr>
              <td>Tempat</td>
              <td>:</td>
              <td>{{ $df_hadir_asesor_pleno->tempat }}</td>
            </tr>
          </table>
        </div>

        <div style="margin-top: 20px; margin-left: -25px; margin-right: -25px">
          <table style="font-size: 15px; width: 100%" cellspacing=0 cellpadding=5 border="1px solid black">
            <thead>
              <tr style="text-align: center">
                <th style="width: 5%">NO</th>
                <th style="width: 30%">NAMA</th>
                <th style="width: 22%">No.Reg.MET</th>
                <th style="width: 22%">JABATAN</th>
                <th style="width: 21%">TANDA TANGAN</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($df_hadir_asesor_pleno->relasi_nama_jabatan as $item)
                @if ($loop->iteration % 2 == 1)
                  <tr>
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td style="text-align: center">{{ $item->no_reg_met }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $loop->iteration }}</td>
                  </tr>
                @else
                  <tr>
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td style="text-align: center">{{ $item->no_reg_met }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td style="padding-left: 35%">{{ $loop->iteration }}</td>
                  </tr>
                @endif
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
                    <tr>
                      <td colspan="3" style="text-align: left;">
                        <div style="margin-left: 248px">
                          <div>
                            <span>{{ $df_hadir_asesor_pleno->jabatan_bttd }},</span>
                          </div>
                          <div style="height: 90px"><img src="{{ $df_hadir_asesor_pleno->ttd }}" alt="ttd"
                              style="width: 140px; margin-left: -10px; margin-top: -2px">
                          </div>
                          <div>
                            <span>{{ $df_hadir_asesor_pleno->nama_bttd }}</span>
                          </div>
                          <div>
                            <span>MET.{{ $df_hadir_asesor_pleno->no_met_bttd }}</span>
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
