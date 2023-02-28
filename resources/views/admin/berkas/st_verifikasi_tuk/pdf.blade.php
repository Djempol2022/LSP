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
    <div style="color: black; margin-top: 1rem">
      <p style="font-size: 12px; margin-bottom: -10px;">Tembusan :</p>
      <ol style="font-size: 12px; padding-left: 15px">
        <li>Ybs</li>
        <li>Arsip</li>
      </ol>
    </div>

    <div style="text-align: right; margin-top: 1rem;">
      <p style="font-size: 10px; margin-bottom: -10px; font-style: italic;">Jalan Raya
        Sintang-Pontianak Km.8 Sintang</p>
      <p style="font-size: 10px; margin-bottom: 0; font-style: italic;">Telp (0565)21377 e-mail :
        lspsmkn1stg@gmail.com</p>
    </div>
  </footer>

  <main>
    <div style="page-break-after: never;">
      <div style="text-align: center; font-size: 15px;">
        <h4 style="margin-bottom: -20px; margin-top: 0px; text-decoration: underline;">SURAT PERINTAH TUGAS VERIFIKASI
          TUK
        </h4>
        <h4 style="margin-bottom: -5px; color: black; font-weight: lighter">Nomor : {{ $st_verifikasi_tuk->no_surat }}
        </h4>
      </div>

      <div style="width: 90%; margin: 20 auto">
        <div style="margin-bottom: 10px">
          <p><span style="font-weight: bolder;">Dasar :</span> Peraturan Badan Nasional Sertifikasi Profesi (BNSP) 201
          </p>
        </div>
        <div>
          <p>Sehubungan dengan diperlukannya verifikasi untuk Tempat Uji Kompetensi
            (TUK)
            LSP {{ $st_verifikasi_tuk->tempat_uji }} untuk
            memenuhi
            persyaratan pelaksanaan Uji Kompetensi
            {{ $st_verifikasi_tuk->relasi_skema_sertifikasi->judul_skema_sertifikasi }}, dengan ini Ketua Lembaga
            Sertifikasi Profesi (LSP) SMK Negeri 1 Sintang menugaskan kepada yang
            namanya tercantum di bawah ini :</p>
          <table style="margin: 0 auto; font-size: 15px; width: 100%" cellpadding='5' cellspacing='0'
            border="1px solid black">
            <thead>
              <tr style="text-align: center; ">
                <th>NO</th>
                <th>NAMA</th>
                <th>JABATAN</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($st_verifikasi_tuk->relasi_nama_jabatan as $item)
                <tr>
                  <td style="text-align: center;">{{ $loop->iteration }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->jabatan }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div style="margin-top: 10px">
          <table cellpadding=10>
            <tr>
              <td style="vertical-align: top; width: 10px;">Untuk</td>
              <td colspan="2" style="vertical-align: top">Menjadi tim asesor lisensi untuk melakukan verifikasi
                terhadap
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top; width: 10px;"></td>
              <td style="vertical-align: top; width: 5px;">1.</td>
              <td style="vertical-align: top">Tempat Uji Kompetensi (TUK) {{ $st_verifikasi_tuk->tempat_uji }}.
                <br>Melaksanakan tugas dengan
                sebaik-baiknya dan penuh tanggung jawab. <br> Tugas ini dilaksanakan dari
                {{ $st_verifikasi_tuk->tanggal_dilaksanakan->isoFormat('D MMMM Y') }}
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top; width: 10px;"></td>
              <td style="vertical-align: top; width: 5px;">2.</td>
              <td style="vertical-align: top">Melaporkan hasil verifikasi kepada Pimpinan LSP.</td>
            </tr>
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
                            <span>{{ $st_verifikasi_tuk->tempat_ditetapkan }},
                              {{ $st_verifikasi_tuk->tanggal_ditetapkan->isoFormat('D MMMM Y') }}</span>
                          </div>
                          <div>
                            <span>{{ $st_verifikasi_tuk->jabatan_bttd }}</span>
                          </div>
                          <div style="height: 90px"><img src="{{ $st_verifikasi_tuk->ttd }}" alt="ttd"
                              style="width: 140px; margin-left: -10px; margin-top: -2px">
                          </div>
                          <div>
                            <span
                              style="font-weight: bolder; text-decoration: underline">{{ $st_verifikasi_tuk->nama_bttd }}</span>
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
