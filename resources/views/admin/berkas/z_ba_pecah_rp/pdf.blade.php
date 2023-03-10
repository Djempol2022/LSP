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
    <div style="page-break-after: always">
      {{-- lembar 1 --}}

      <div style="text-align: center; display: flex; flex-direction: column; font-size: 15px;">
        <h4 style="margin-bottom: -20px; margin-top: 10px;">BERITA ACARA
        </h4>
        <h4 style="margin-bottom: -5px;">PELAKSANAAN RAPAT PLENO</h4>
      </div>

      <div style="width: 90%; margin: 20px auto 0 auto; position: relative;">
        <div>
          <p style="text-align: justify">Pada hari ini ..................... tanggal
            ............................... tahun
            ............................... bertempat di {{ $z_ba_pecah_rp->relasi_institusi->nama_institusi }},
            telah diadakan
            Rapat Pleno LSP SMK Negeri 1 Sintang untuk membahas hasil uji kompetensi
            {{ $z_ba_pecah_rp->relasi_skema_sertifikasi->judul_skema_sertifikasi }}. <br />
            Adapun hasil dari Rapat Pleno tersebut tercantum sebagai berikut:
          </p>
        </div>

        <div style="margin-top: 20px">
          <ol>
            <li>Pelaksanaan asesmen dilaksanakan pada tanggal
              {{ $z_ba_pecah_rp->tgl_tes_tertulis->isoFormat('D MMMM Y') }}
              untuk
              tes tertulis dan tanggal
              {{ $z_ba_pecah_rp->tgl_tes_praktek->isoFormat('D MMMM Y') }} untuk tes praktek.
            </li>
            <li>
              Jumlah asesi yang mengikuti uji kompetensi secara keseluruhan berjumlah {{ $z_ba_pecah_rp->jml_asesi }}
              peserta.
            </li>
            <li>Uji Kompetensi dimulai dari pukul {{ $z_ba_pecah_rp->wkt_mulai_uk->format('H:i') }} WIB sampai pukul
              {{ $z_ba_pecah_rp->wkt_selesai_uk->format('H:i') }} WIB di
              {{ $z_ba_pecah_rp->relasi_nama_tuk->nama_tuk }}.
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
                            <span>{{ $z_ba_pecah_rp->jabatan_bttd }}</span>
                          </div>
                          <div style="height: 115px"><img src="{{ $z_ba_pecah_rp->ttd }}" alt="ttd"
                              style="width: 140px; margin-left: -10px; margin-top: -2px">
                          </div>
                          <div>
                            <span>{{ $z_ba_pecah_rp->nama_bttd }}</span>
                          </div>
                          <div>
                            <span>MET.{{ $z_ba_pecah_rp->no_met_bttd }}</span>
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
    <div style="page-break-after: always">
      {{-- lembar 2 --}}

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
                ..........................................................................</td>
            </tr>
            <tr style="font-weight: bolder; color: black;">
              <td style="vertical-align: top;">Waktu Rapat</td>
              <td style="vertical-align: top;">:</td>
              <td style="vertical-align: top;">
                ..........................................................................
              </td>
            </tr>
            <tr style="font-weight: bolder; color: black;">
              <td style="vertical-align: top;">Tempat Rapat</td>
              <td style="vertical-align: top;">:</td>
              <td style="vertical-align: top;">{{ $z_ba_pecah_rp->tempat_rapat }}</td>
            </tr>
            <tr style="font-weight: bolder; color: black;">
              <td style="vertical-align: top;">Topik</td>
              <td style="vertical-align: top;">:</td>
              <td style="vertical-align: top;">{{ $z_ba_pecah_rp->topik }}</td>
            </tr>
            <tr style="font-weight: bolder; color: black;">
              <td style="vertical-align: top;">Ketua Rapat</td>
              <td style="vertical-align: top;">:</td>
              <td style="vertical-align: top;">{{ $z_ba_pecah_rp->ketua_rapat }}</td>
            </tr>
            <tr style="font-weight: bolder; color: black;">
              <td style="vertical-align: top;">Notulis</td>
              <td style="vertical-align: top;">:</td>
              <td style="vertical-align: top;">{{ $z_ba_pecah_rp->notulis }}</td>
            </tr>
            <tr style="font-weight: bolder; color: black;">
              <td colspan="3">Daftar Peserta Rapat</td>
            </tr>
          </table>
        </div>
        <div style="margin-top: 10px">
          <table style="margin: 0 auto; font-size: 15px; width: 100%" cellspacing=0 cellpadding=5
            border="1px solid black">
            <thead>
              <tr style="text-align: center;">
                <td style="width: 7%;">No</td>
                <td style="width: 41%;">Nama Peserta</td>
                <td style="width: 29%;">Jabatan</td>
                <td style="width: 23%;">Tanda Tangan</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($z_ba_pecah_rp->relasi_nama_jabatan as $item)
                @if ($loop->iteration % 2 == 0)
                  <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td style="padding-left: 35%">{{ $loop->iteration }}</td>
                  </tr>
                @else
                  <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
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
            {{ $z_ba_pecah_rp->tgl_tes_tertulis->isoFormat('D MMMM Y') }} dan
            {{ $z_ba_pecah_rp->tgl_tes_praktek->isoFormat('D MMMM Y') }}, maka dirasa perlu mengadakan rapat
            pleno untuk membahas segala kendala dan pencapaian dalam uji kompetensi tersebut.</p>
        </div>
      </div>
    </div>
    <div style="page-break-after: never">
      {{-- lembar 3 --}}

      <div style="width: 90%; margin: 0 auto -20px auto;">
        <div style="color: black;">
          <h4 style="font-weight: bold; margin-bottom: -10px;">Bahasan/Diskusi</h4>
          <ol style="padding-left: 20px;">
            @foreach ($z_ba_pecah_rp->relasi_bahasan_diskusi as $item)
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
              <td style="padding-left: 30%">{{ $z_ba_pecah_rp->jabatan_bttd }}</td>
            </tr>
            <tr>
              <td style="height: 90px">

              </td>
              <td style="padding-left: 30%">
                <img src="{{ $z_ba_pecah_rp->ttd }}" style="width: 140px" alt="ttd">
              </td>
            </tr>
            <tr>
              <td>{{ $z_ba_pecah_rp->notulis }}</td>
              <td style="padding-left: 30%">{{ $z_ba_pecah_rp->nama_bttd }}</td>
            </tr>
            <tr>
              <td>MET.{{ $z_ba_pecah_rp->no_met_notulis }}</td>
              <td style="padding-left: 30%">
                MET.{{ $z_ba_pecah_rp->no_met_bttd }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </main>


</body>

</html>
