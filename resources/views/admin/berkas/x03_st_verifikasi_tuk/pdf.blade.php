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
    <div style="color: black; margin-top: 0.5rem">
      <p style="font-size: 12px; margin-bottom: -10px; font-style: italic">Tembusan :</p>
      <ol style="font-size: 12px; padding-left: 15px">
        <li style="font-style: italic">Ybs</li>
        <li style="font-style: italic">Arsip</li>
      </ol>
    </div>

    @include('layout.footer-berkas')
  </footer>

  <main>
    <div style="page-break-after: never;">
      <div style="text-align: center; display: flex; flex-direction: column; font-size: 15px;">
        <h4 style="margin-bottom: -20px; margin-top: 0px; text-decoration: underline;">SURAT TUGAS
        </h4>
        <h4 style="margin-bottom: -5px; font-weight: lighter; color: black">Nomor :
          {{ $x03_st_verifikasi_tuk->no_surat }}</h4>
      </div>

      <div style="width: 100%; position: relative; margin-top: 10px;">
        <div style="width: 90%; position: absolute; right: 0;">
          <table>
            <tr>
              <td style="width: 20%; vertical-align: top;">Dasar</td>
              <td style="width: 5%; vertical-align: top;">:</td>
              <td style="width: 75%; vertical-align: top;">
                <ol style="padding-left: 15px; margin-top: 0;">
                  <li>Peraturan BNSP Nomor : 12/BNSP.214/XII/2013 Tentang Pedoman Verifikasi TUK oleh TUK</li>
                  <li>Berdasarkan Surat Keputusan Ketua LSP-P1 SMKN 1 Sintang Nomor: SK 004/LSP.SMKN1-STG/VIII/2021
                    Tanggal 19 Agustus 2021 Tentang Penetapan Struktur Organisasi LSP</li>
                </ol>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top;">Maksud</td>
              <td style="vertical-align: top;">:</td>
              <td style="vertical-align: top;">Diperlukan Tim untuk memverifikasi Tempat Uji Kompetensi untuk memenuhi
                ketentuan Peraturan BNSP.</td>
            </tr>
            <tr>
              <td style="vertical-align: top;">Luaran</td>
              <td style="vertical-align: top;">:</td>
              <td style="vertical-align: top;">Dokumen verifikasi sesuai format, daftar hadir, foto dokumentasi</td>
            </tr>
            <tr>
              <td style="vertical-align: top;">MENUGASKAN</td>
              <td style="vertical-align: top;">:</td>
              <td style="vertical-align: top;">Nama yang tertera dibawah ini dianggap cakap menjadi tim untuk
                memverifikasi Tempat Uji Kompetensi (sewaktu).</td>
            </tr>
            <tr>
              <td style="vertical-align: top;"></td>
              <td style="vertical-align: top;"></td>
              <td style="vertical-align: top;">
                <table style="margin: 0 auto; font-size: 15px; width: 100%" cellpadding='5' cellspacing='0'
                  border="1px solid black">
                  <thead>
                    <tr>
                      <td style="width: 5%; text-align: center;">No</td>
                      <td style="width: 55%">Nama</td>
                      <td style="width: 40%">Jabatan</td>
                    </tr>
                  </thead>
                  <tbody id="bodyTable_x03_x03_st_verifikasi_tuk">
                    @foreach ($x03_st_verifikasi_tuk->relasi_nama_jabatan as $item)
                      <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top;">Untuk</td>
              <td style="vertical-align: top;">:</td>
              <td style="vertical-align: top;">
                <ol style="padding-left: 15px; margin-top: 0;">
                  <li>Melaksanakan tugas sebaik-baiknya dan penuh tanggung jawab yang akan diselenggarakan pada :
                    <br />
                    <table>
                      <tr>
                        <td style="width: 25%; vertical-align: top;">Hari/Tanggal</td>
                        <td style="width: 5%; vertical-align: top;">:</td>
                        <td style="width: 70%; vertical-align: top;">
                          {{ $x03_st_verifikasi_tuk->tanggal_mulai->isoFormat('dddd, D MMMM Y') }} s.d
                          {{ $x03_st_verifikasi_tuk->tanggal_selesai->isoFormat('D MMMM Y') }}
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align: top;">Waktu</td>
                        <td style="vertical-align: top;">:</td>
                        <td style="vertical-align: top;" class="d-flex align-items-center">
                          {{ $x03_st_verifikasi_tuk->waktu->format('H:i') }}
                          <span> WIB
                            - selesai</span>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align: top;">Nama TUK</td>
                        <td style="vertical-align: top;">:</td>
                        <td style="vertical-align: top;">{{ $x03_st_verifikasi_tuk->relasi_nama_tuk->nama_tuk }}</td>
                      </tr>
                    </table>
                  </li>
                  <li>Melaporkan hasil verifikasi secara tertulis kepada Ketua LSP</li>
                </ol>
              </td>
            </tr>
            <tr>
              <td colspan=3>Demikian Surat Tugas ini dibuat untuk melaksanakan sebagaimana mestinya.</td>
            </tr>
          </table>

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
                              <span>{{ $x03_st_verifikasi_tuk->tempat_ditetapkan }},
                                {{ $x03_st_verifikasi_tuk->tanggal_ditetapkan->isoFormat('D MMMM Y') }}</span>
                            </div>
                            <div>
                              <span>{{ $x03_st_verifikasi_tuk->jabatan_bttd }}</span>
                            </div>
                            <div style="height: 90px"><img src="{{ $x03_st_verifikasi_tuk->ttd }}" alt="ttd"
                                style="width: 140px; margin-left: -10px; margin-top: -2px">
                            </div>
                            <div>
                              <span>{{ $x03_st_verifikasi_tuk->nama_bttd }}</span>
                            </div>
                            <div>
                              <span>MET.{{ $x03_st_verifikasi_tuk->no_met_bttd }}</span>
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
    </div>
  </main>


</body>

</html>
