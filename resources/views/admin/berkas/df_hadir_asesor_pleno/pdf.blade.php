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

    <div style="position: absolute; bottom: 260px; right: 0;">
      <p style="font-size: 10px; margin-bottom: -10px; font-style: italic;">Jalan Raya
        Sintang-Pontianak Km.8 Sintang</p>
      <p style="font-size: 10px; margin-bottom: 0; font-style: italic;">Telp (0565)21377 e-mail :
        lspsmkn1stg@gmail.com</p>
    </div>
  </div>


</body>

</html>
