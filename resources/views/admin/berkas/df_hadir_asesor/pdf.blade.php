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
      <div style="text-align: center; font-size: 15px;">
        <h4 style="margin-top: 10px;">DAFTAR HADIR ASESI
        </h4>
      </div>

      <div style="width: 90%; margin-top: 30px position: relative; margin-left: 65px">
        <div>
          <table style="width: 100%">
            <tr>
              <td style="width: 12%">Tanggal</td>
              <td style="width: 3%">:</td>
              <td style="width: 85%">
                ....................................................................................................
              </td>
            </tr>
            <tr>
              <td>Waktu</td>
              <td>:</td>
              <td> ....................................................................................................
              </td>
            </tr>
            <tr>
              <td>Tempat</td>
              <td>:</td>
              <td> ....................................................................................................
              </td>
            </tr>
            <tr>
              <td>Kegiatan</td>
              <td>:</td>
              <td> ....................................................................................................
              </td>
            </tr>
          </table>
        </div>

        <div style="margin-top: 30px;">
          <table style="font-size: 15px; width: 100%" cellspacing=0 cellpadding=5 border="1px solid black">
            <thead>
              <tr style="text-align: center">
                <th style="width: 5%;">No</th>
                <th style="width: 43%;">Nama Asesi</th>
                <th style="width: 27%;">Kompetensi Keahlian</th>
                <th style="width: 25%;">Tanda Tangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align: center;">1</td>
                <td style="height: 27px"></td>
                <td></td>
                <td>1</td>
              </tr>
              <tr>
                <td style="text-align: center;">2</td>
                <td style="height: 30px"></td>
                <td></td>
                <td style="padding-left: 60px">2</td>
              </tr>
              <tr>
                <td style="text-align: center;">3</td>
                <td style="height: 27px"></td>
                <td></td>
                <td>3</td>
              </tr>
              <tr>
                <td style="text-align: center;">4</td>
                <td style="height: 30px"></td>
                <td></td>
                <td style="padding-left: 60px">4</td>
              </tr>
              <tr>
                <td style="text-align: center;">5</td>
                <td style="height: 27px"></td>
                <td></td>
                <td>5</td>
              </tr>
              <tr>
                <td style="text-align: center;">6</td>
                <td style="height: 30px"></td>
                <td></td>
                <td style="padding-left: 60px">6</td>
              </tr>
              <tr>
                <td style="text-align: center;">7</td>
                <td style="height: 27px"></td>
                <td></td>
                <td>7</td>
              </tr>
              <tr>
                <td style="text-align: center;">8</td>
                <td style="height: 30px"></td>
                <td></td>
                <td style="padding-left: 60px">8</td>
              </tr>
              <tr>
                <td style="text-align: center;">9</td>
                <td style="height: 27px"></td>
                <td></td>
                <td>9</td>
              </tr>
              <tr>
                <td style="text-align: center;">10</td>
                <td style="height: 30px"></td>
                <td></td>
                <td style="padding-left: 60px">10</td>
              </tr>
              <tr>
                <td style="text-align: center;">11</td>
                <td style="height: 27px"></td>
                <td></td>
                <td>11</td>
              </tr>
              <tr>
                <td style="text-align: center;">12</td>
                <td style="height: 30px"></td>
                <td></td>
                <td style="padding-left: 60px">12</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div style="page-break-after: always">
      <div style="text-align: center; font-size: 15px;">
        <h4 style="margin-bottom: -10px; margin-top: 10px;">DAFTAR HADIR PANITIA
        </h4>
        <h4 style="margin-bottom: -20px; margin-top: 10px;">UJI KOMPETENSI LSP-P1 SMKN 1 SINTANG
        </h4>
        <h4 style="margin-bottom: -5px;">TAHUN PELAJARAN
          {{ $df_hadir_asesor->thn_ajaran->isoFormat('Y') }}/{{ $df_hadir_asesor->thn_ajaran->isoFormat('Y') + 1 }}</h4>
      </div>

      <div style="width: 90%; margin: 20px auto 0 auto; position: relative;">
        <div>
          <table style="width: 100%">
            <tr>
              <td style="width: 12%">Hari/Tanggal</td>
              <td style="width: 3%">:</td>
              <td style="width: 85%">
                ....................................................................................................
              </td>
            </tr>
            <tr>
              <td>Waktu</td>
              <td>:</td>
              <td> ....................................................................................................
              </td>
            </tr>
            <tr>
              <td>Tempat</td>
              <td>:</td>
              <td> ....................................................................................................
              </td>
            </tr>
          </table>
        </div>

        <div style="margin-top: 30px;">
          <table style="font-size: 15px; width: 100%" cellspacing=0 cellpadding=5 border="1px solid black">
            <thead>
              <tr style="text-align: center">
                <th style="width: 5%;">NO</th>
                <th style="width: 43%;">NAMA</th>
                <th style="width: 27%;">JABATAN</th>
                <th style="width: 25%;">TANDA TANGAN</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($df_hadir_asesor->relasi_nama_jabatan as $item)
                @if ($item->is_nip == 1)
                  @if ($loop->iteration % 2 == 0)
                    <tr>
                      <td style="text-align: center;">{{ $loop->iteration }}</td>
                      <td style="height: 30px;">
                        {{ $item->nama }} <br />
                        @if ($item->nip != null)
                          NIP.{{ $item->nip }}
                        @endif
                      </td>
                      <td>{{ $item->jabatan }}</td>
                      <td style="padding-left: 60px">{{ $loop->iteration }}</td>
                    </tr>
                  @else
                    <tr>
                      <td style="text-align: center;">{{ $loop->iteration }}</td>
                      <td style="height: 30px;">
                        {{ $item->nama }} <br />
                        @if ($item->nip != null)
                          NIP.{{ $item->nip }}
                        @endif
                      </td>
                      <td>{{ $item->jabatan }}</td>
                      <td>{{ $loop->iteration }}</td>
                    </tr>
                  @endif
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div style="page-break-after: never">

      <div style="text-align: center; font-size: 15px;">
        <h4 style="margin-bottom: -10px; margin-top: 10px;">DAFTAR HADIR ASESOR
        </h4>
        <h4 style="margin-bottom: -20px; margin-top: 10px;">UJI KOMPETENSI LSP-P1 SMKN 1 SINTANG
        </h4>
        <h4 style="margin-bottom: -5px;">TAHUN PELAJARAN
          {{ $df_hadir_asesor->thn_ajaran->isoFormat('Y') }}/{{ $df_hadir_asesor->thn_ajaran->isoFormat('Y') + 1 }}
        </h4>
      </div>

      <div style="width: 90%; margin: 20px auto 0 auto; position: relative;">
        <div style="margin-top: 20px; margin-left: 30px">
          <table style="width: 100%">
            <tr>
              <td style="width: 12%">Hari/Tanggal</td>
              <td style="width: 3%">:</td>
              <td style="width: 85%">{{ $df_hadir_asesor->tgl->isoFormat('dddd / D MMMM Y') }}</td>
            </tr>
            <tr>
              <td>Waktu</td>
              <td>:</td>
              <td>{{ $df_hadir_asesor->wkt_mulai->format('H:i') }} s/d
                {{ $df_hadir_asesor->wkt_selesai->format('H:i') }}
                WIB</td>
            </tr>
            <tr>
              <td>Tempat</td>
              <td>:</td>
              <td>{{ $df_hadir_asesor->tempat }}</td>
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
              @php
                $no = 1;
              @endphp
              @foreach ($df_hadir_asesor->relasi_nama_jabatan as $item)
                @if ($item->is_nip == 0)
                  @if ($no % 2 == 1)
                    <tr>
                      <td style="text-align: center">{{ $no }}</td>
                      <td>{{ $item->nama }}</td>
                      <td style="text-align: center">{{ $item->no_reg_met }}</td>
                      <td>{{ $item->jabatan }}</td>
                      <td>{{ $no++ }}</td>
                    </tr>
                  @else
                    <tr>
                      <td style="text-align: center">{{ $no }}</td>
                      <td>{{ $item->nama }}</td>
                      <td style="text-align: center">{{ $item->no_reg_met }}</td>
                      <td>{{ $item->jabatan }}</td>
                      <td style="padding-left: 35%">{{ $no++ }}</td>
                    </tr>
                  @endif
                @endif
              @endforeach
            </tbody>
          </table>
        </div>

        <div>
          <table style="font-size: 13px; margin-top: 30px; width: 100%">
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
                            <span>Mengetahui,</span>
                          </div>
                          <div>
                            <span>{{ $df_hadir_asesor->jabatan_bttd }},</span>
                          </div>
                          <div style="height: 105px"><img src="{{ $df_hadir_asesor->ttd }}" alt="ttd"
                              style="width: 120px; margin-left: 10px; margin-top: -2px">
                          </div>
                          <div>
                            <span>{{ $df_hadir_asesor->nama_bttd }}</span>
                          </div>
                          <div>
                            <span>MET.{{ $df_hadir_asesor->no_met_bttd }}</span>
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
