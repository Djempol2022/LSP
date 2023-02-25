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
  {{-- lembar 1 --}}
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
            {{ $df_hadir_asesi->waktu->format('H:i') ?? '....................................................................................................' }}
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

      <div style="position: absolute; right: 0;">
        <p style="font-size: 10px; margin-bottom: -10px; font-style: italic;">Jalan Raya
          Sintang-Pontianak Km.8 Sintang</p>
        <p style="font-size: 10px; margin-bottom: 0; font-style: italic;">Telp (0565)21377 e-mail :
          lspsmkn1stg@gmail.com</p>
      </div>
    </div>
  </div>


</body>

</html>
