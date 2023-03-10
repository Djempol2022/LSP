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
    <div style="page-break-after: never;">
      <div style="text-align: center; font-size: 15px;">
        <h4 style="margin-top: 10px;">DAFTAR HADIR ASESI
        </h4>
      </div>

      <div style="width: 100%; margin-top: 30px position: relative;">
        <div style="margin-left: 25px">
          <table style="width: 100%">
            <tr>
              <td style="width: 12%">Tanggal</td>
              <td style="width: 3%">:</td>
              <td style="width: 85%">
                {{ $df_hadir_asesi->tgl->isoFormat('D MMMM Y') ?? '....................................................................................................' }}
              </td>
            </tr>
            <tr>
              <td>Waktu</td>
              <td>:</td>
              <td>
                {{ $df_hadir_asesi->waktu ? $df_hadir_asesi->waktu->format('H:i') . ' WIB - selesai' : '....................................................................................................' }}
              </td>
            </tr>
            <tr>
              <td>Tempat</td>
              <td>:</td>
              <td>
                {{ $df_hadir_asesi->tempat ?? '....................................................................................................' }}
              </td>
            </tr>
            <tr>
              <td>Skema</td>
              <td>:</td>
              <td>
                {{ $df_hadir_asesi->skema_sertifikasi_id ? $df_hadir_asesi->relasi_skema_sertifikasi->judul_skema_sertifikasi : '....................................................................................................' }}
              </td>
            </tr>
          </table>
        </div>

        <div style="margin-top: 20px;">
          <table style="font-size: 15px; width: 100%" cellspacing=0 cellpadding=5 border="1px solid black">
            <thead>
              <tr style="text-align: center">
                <th style="width: 5%;">No</th>
                <th style="width: 30%;">No. Peserta</th>
                <th style="width: 22%;">Nama Asesi</th>
                <th style="width: 18%;">Asal Sekolah</th>
                <th style="width: 25%;">Tanda Tangan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($df_hadir_asesi->relasi_df_hadir_asesi_child as $item)
                @if ($loop->iteration % 2 == 0)
                  <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td style="height: 30px;">
                      {{ $item->no_peserta }}
                    </td>
                    <td>{{ $item->nama_asesi }}</td>
                    <td>{{ $item->relasi_institusi->nama_institusi }}</td>
                    <td style="padding-left: 60px">{{ $loop->iteration }}</td>
                  </tr>
                @else
                  <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td style="height: 30px;">
                      {{ $item->no_peserta }}
                    </td>
                    <td>{{ $item->nama_asesi }}</td>
                    <td>{{ $item->relasi_institusi->nama_institusi }}</td>
                    <td>{{ $loop->iteration }}</td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>

        <div style="width: 100%; margin: 40px auto 0 auto; position: relative;">

          <div style="margin-bottom: 50px">
            <table style="width: 100%;">
              <tr>
                <td style="width: 50%"></td>
                <td style="width: 50%; padding-left: 30%">Mengetahui,</td>
              </tr>
              <tr>
                <td style="padding-left: 12%">Asesor</td>
                <td style="padding-left: 30%">{{ $df_hadir_asesi->jabatan_bttd }}</td>
              </tr>
              <tr>
                <td>
                  <img src="{{ $df_hadir_asesi->ttd_asesor }}" style="width: 140px" alt="ttd">
                </td>
                <td style="padding-left: 30%">
                  <img src="{{ $df_hadir_asesi->ttd_bttd }}" style="width: 140px" alt="ttd">
                </td>
              </tr>
              <tr>
                <td>{{ $df_hadir_asesi->nama_asesor }}</td>
                <td style="padding-left: 30%">{{ $df_hadir_asesi->nama_bttd }}</td>
              </tr>
              <tr>
                <td>MET.{{ $df_hadir_asesi->no_met_asesor }}</td>
                <td style="padding-left: 30%">
                  MET.{{ $df_hadir_asesi->no_met_bttd }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>


</body>

</html>
