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

  <div style="text-align: center; display: flex; flex-direction: column; font-size: 15px;">
    <h4 style="margin-bottom: -20px; margin-top: 10px;">BERITA ACARA</h4>
    <h4 style="margin-bottom: -5px;">PELAKSANAAN RAPAT PLENO</h4>
  </div>

  <div style="width: 90%; margin: 20px auto 0 auto; position: relative;">
    <div>
      <p>Pada hari ini .......................... tanggal
        .................................... tahun
        ............................... bertempat di {{ $z_ba_rp->relasi_institusi->nama_institusi }},
        telah diadakan
        Rapat Pleno LSP SMK Negeri 1 Sintang untuk membahas hasil uji kompetensi
        {{ $z_ba_rp->relasi_skema_sertifikasi->judul_skema_sertifikasi }}. <br />
        Adapun hasil dari Rapat Pleno tersebut tercantum sebagai berikut:
      </p>
    </div>

    <div style="margin-top: 20px">
      <ol>
        <li>Pelaksanaan asesmen dilaksanakan pada tanggal {{ $z_ba_rp->tgl_tes_tertulis->isoFormat('D MMMM Y') }}
          sampai tanggal
          {{ $z_ba_rp->tgl_tes_praktek->isoFormat('D MMMM Y') }}.
        </li>
        <li>
          Jumlah asesi yang mengikuti uji kompetensi secara keseluruhan berjumlah {{ $z_ba_rp->jml_asesi }}
          peserta.
        </li>
        <li>Uji Kompetensi dimulai dari pukul {{ $z_ba_rp->wkt_mulai_uk->format('H:i') }} WIB sampai pukul
          {{ $z_ba_rp->wkt_selesai_uk->format('H:i') }} WIB di {{ $z_ba_rp->relasi_nama_tuk->nama_tuk }}.
        </li>
        <li>Diperlukan persiapan beberapa bahan habis pakai dan perlengkapan untuk keperluan uji kompetensi yang
          selanjutnya dikoordinasikan dengan pihak TUK.</li>
      </ol>
    </div>
    <p style="margin-top: 40px">Demikian Berita Acara Rapat Pleno ini dibuat dengan sebenar-benarnya.</p>

    <div>
      <table style="font-size: 13px; margin-top: 60px; width: 100%">
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
                        <span>Sintang, .............................</span>
                      </div>
                      <div>
                        <span>{{ $z_ba_rp->jabatan_bttd }}</span>
                      </div>
                      <div style="height: 115px"><img src="{{ $z_ba_rp->ttd }}" alt="ttd"
                          style="width: 140px; margin-left: -10px; margin-top: -2px">
                      </div>
                      <div>
                        <span>{{ $z_ba_rp->nama_bttd }}</span>
                      </div>
                      <div>
                        <span>MET.{{ $z_ba_rp->no_met_bttd }}</span>
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

  <div class="page-break"></div>

  {{-- lembar 2 --}}
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
    <h4 style="margin-bottom: -20px; margin-top: 10px;">NOTULEN RAPAT PLENO PELAKSANAAN UJI KOMPETENSI
    </h4>
    <h4 style="margin-bottom: -5px;">LSP SMK NEGERI 1 SINTANG</h4>
  </div>

  <div style="width: 90%; margin: 40px auto 0 auto; position: relative;">
    <div>
      <table style="width: 100%">
        <tr style="font-weight: bolder; color: black;">
          <td style="width: 22%; vertical-align: top;">Tanggal Rapat</td>
          <td style="width: 3%; vertical-align: top;">:</td>
          <td style="width: 75%; vertical-align: top;">
            {{ $z_ba_rp->tgl_rapat->isoFormat('D MMMM Y') }}</td>
        </tr>
        <tr style="font-weight: bolder; color: black;">
          <td style="vertical-align: top;">Waktu Rapat</td>
          <td style="vertical-align: top;">:</td>
          <td style="vertical-align: top;">{{ $z_ba_rp->wkt_rapat->format('H:i') }} WIB - Selesai
          </td>
        </tr>
        <tr style="font-weight: bolder; color: black;">
          <td style="vertical-align: top;">Tempat Rapat</td>
          <td style="vertical-align: top;">:</td>
          <td style="vertical-align: top;">{{ $z_ba_rp->tempat_rapat }}</td>
        </tr>
        <tr style="font-weight: bolder; color: black;">
          <td style="vertical-align: top;">Topik</td>
          <td style="vertical-align: top;">:</td>
          <td style="vertical-align: top;">{{ $z_ba_rp->topik }}</td>
        </tr>
        <tr style="font-weight: bolder; color: black;">
          <td style="vertical-align: top;">Ketua Rapat</td>
          <td style="vertical-align: top;">:</td>
          <td style="vertical-align: top;">{{ $z_ba_rp->ketua_rapat }}</td>
        </tr>
        <tr style="font-weight: bolder; color: black;">
          <td style="vertical-align: top;">Notulis</td>
          <td style="vertical-align: top;">:</td>
          <td style="vertical-align: top;">{{ $z_ba_rp->notulis }}</td>
        </tr>
        <tr style="font-weight: bolder; color: black;">
          <td colspan="3">Daftar Peserta Rapat</td>
        </tr>
      </table>
    </div>
    <div style="margin-top: 10px">
      <table style="margin: 0 auto; font-size: 15px; width: 100%" cellspacing=0 cellpadding=5 border="1px solid black">
        <thead>
          <tr style="text-align: center;">
            <td style="width: 4%;">No</td>
            <td style="width: 34%;">Nama Asesor</td>
            <td style="width: 24%;">Jabatan</td>
            <td style="width: 19%;">Jumlah Asesi</td>
            <td style="width: 19%;">Tanda Tangan</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($z_ba_rp->relasi_nama_jabatan as $item)
            @if ($loop->iteration % 2 == 0)
              <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->jml_asesi ?? '-' }}</td>
                <td style="padding-left: 35%">{{ $loop->iteration }}</td>
              </tr>
            @else
              <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->jml_asesi ?? '-' }}</td>
                <td>{{ $loop->iteration }}</td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
    <div style="margin-top: 10px;">
      <h4 style="color: black; font-weight: bolder;">Latar Belakang Pelaksanaan Rapat</h4>
      <p style="color: black;">Setelah pelaksanaan uji kompetensi pada tanggal
        {{ $z_ba_rp->tgl_tes_tertulis->isoFormat('D MMMM Y') }} s/d
        {{ $z_ba_rp->tgl_tes_praktek->isoFormat('D MMMM Y') }}, maka dirasa perlu mengadakan rapat
        pleno untuk membahas segala kendala dan pencapaian dalam uji kompetensi tersebut.</p>
    </div>

    <div style="position: absolute; bottom: 260px; right: 0;">
      <p style="font-size: 10px; margin-bottom: -10px; font-style: italic;">Jalan Raya
        Sintang-Pontianak Km.8 Sintang</p>
      <p style="font-size: 10px; margin-bottom: 0; font-style: italic;">Telp (0565)21377 e-mail :
        lspsmkn1stg@gmail.com</p>
    </div>
  </div>

  <div class="page-break"></div>

  {{-- lembar 3 --}}
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

  <div style="width: 90%; margin: 0 auto -20px auto;">
    <div style="color: black;">
      <h4 style="font-weight: bold; margin-bottom: -10px;">Bahasan/Diskusi</h4>
      <ol style="padding-left: 20px;">
        @foreach ($z_ba_rp->relasi_bahasan_diskusi as $item)
          <li>{{ $item->bahasan_diskusi }}</li>
        @endforeach
      </ol>
    </div>
  </div>

  <div style="width: 100%; padding-left: 35px">
    <div>
      <h4 style="font-weight: bold; color: black; margin-bottom: 5px">Kesimpulan Rapat</h4>
      <table style="font-size: 15px; width: 95%" cellspacing=0 cellpadding=5 border="1px solid black">
        <thead>
          <tr style="text-align: center">
            <th style="width: 5%">No.</th>
            <th style="width: 22%">Masalah/Isu</th>
            <th style="width: 30%">Uraian</th>
            <th style="width: 22%">Tindak Lanjut</th>
            <th style="width: 21%">Target Penyelesaian</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="height: 90px;"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="height: 90px;"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="height: 90px;"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div style="width: 90%; margin: 20px auto 0 auto; position: relative;">

    <div style="margin-bottom: 50px">
      <table style="width: 100%;">
        <tr>
          <td style="width: 50%"></td>
          <td style="width: 50%; padding-left: 30%">Sintang, .............................</td>
        </tr>
        <tr>
          <td>Notulis,</td>
          <td style="padding-left: 30%">{{ $z_ba_rp->jabatan_bttd }}</td>
        </tr>
        <tr>
          <td style="height: 90px">

          </td>
          <td style="padding-left: 30%">
            <img src="{{ $z_ba_rp->ttd }}" style="width: 140px" alt="ttd">
          </td>
        </tr>
        <tr>
          <td>{{ $z_ba_rp->notulis }}</td>
          <td style="padding-left: 30%">{{ $z_ba_rp->nama_bttd }}</td>
        </tr>
        <tr>
          <td>MET.{{ $z_ba_rp->no_met_notulis }}</td>
          <td style="padding-left: 30%">
            MET.{{ $z_ba_rp->no_met_bttd }}</td>
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


</body>

</html>
