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
    </tr>
  </table>
  <hr />

  <div class="text-center d-flex flex-column"
    style="text-align: center; display: flex; flex-direction: column; font-size: 15px;">
    <h4 style="margin-bottom: -20px; margin-top: 0px;">SURAT KEPUTUSAN</h4>
    <h4 style="margin-bottom: -20px">KETUA LSP SMK NEGERI 1 SINTANG</h4>
    <h4 style="margin-bottom: -10px">Nomor : {{ $sk_penetapan_tuk->no_sk }}</h4>
    <h4 style="font-style: italic; font-weight: lighter; margin-bottom: -10px">Tentang</h4>
    <h4 style="margin-bottom: -17px">PENEMPATAN TEMPAT UJI KOMPETENSI (TUK) TERVERIFIKASI</h4>
  </div>
  <div>
    <div>
      <table>
        <tbody>
          <tr>
            <td colspan="3" style="text-align: center; font-size: 15px;">
              <h4 style="margin-bottom: 0px">Ketua LSP</h4>
            </td>
          </tr>
          <tr style="height: 60px; font-size: 13px;">
            <td style="width: 18%; vertical-align: top;">MENIMBANG</td>
            <td style="width: 2%; vertical-align: top;">:</td>
            <td style="width: 80%; vertical-align: top;">Untuk menjamin Sertifikasi
              Kompetensi Keahlian
              maka
              harus didukung
              oleh Kelayakan
              Tempat Uji
              Kompetensi yang selalu siap pakai dan sesuai dengan keahlian yang akan diujikan.</td>
          </tr>
          <tr style="font-size: 13px;">
            <td style="width: 18%; vertical-align: top;">MENGINGAT</td>
            <td style="width: 2%; vertical-align: top;">:</td>
            <td style="width: 80%; vertical-align: top;">
              <ol style="padding-left: 5px; list-style-position: inside; margin-top: 0px">
                <li>UU No. 13 tahun 2003 tentang ketenagakerjaan pasal 18 bahwa Pengakuan
                  Kompetensi
                  Kerja dilakukan
                  melalui sertifikasi kompetensi kerja oleh BNSP yang indipenden;</li>
                <li>UU No. 20 tahun 2003 tentang Sistim Pendidikan Nasional;</li>
                <li>UU No. 12 tahun 2012 tentang Pendidikan Tinggi bahwa sertifikat
                  kompetensi/
                  profesi diberikan
                  kepada lulusan pendidikan tinggi vokasi/profesi; </li>
                <li>Peraturan Pemerintah No. 23 tahun 2004 tentang Badan Nasional
                  Sertifikasi
                  Profesi
                  bahwa BNSP
                  mempunyai tugas melaksanakan sertifikasi kompetensi kerja (pasal 3); </li>
                <li>Peraturan Pemerintah No. 31 tahun 2006 tentang Sistem Pelatihan Kerja
                  Nasional
                  (SISLATKERNAS)
                  bahwa sertifikasi kompetensi kerja oleh LSP terlisensi BNSP; </li>
                <li>Peraturan Pemerintah No. 31 tahun 2006 tentang Sistem Pelatihan Kerja
                  Nasional
                  (SISLATKERNAS)
                  bahwa sertifikasi kompetensi kerja oleh LSP terlisensi BNSP; </li>
                <li>ISO 17024 tahun 2012 Conformity Assisment General Requirements for
                  Bodies
                  Operating
                  Certification System of Persons.</li>
                <li>Panduan BNSP 206 tentang persyaratan Tempat Uji Kompetensi</li>
                <li>Hasil Verifikasi Kelayakan Tempat Uji Kompetensi</li>
              </ol>
            </td>
          </tr>
          <tr>
            <td colspan="3" style="text-align: center; font-size: 15px;">
              <h4 style="margin-bottom: 0px">Memutuskan</h4>
            </td>
          </tr>
          <tr style="font-size: 13px;">
            <td style="width: 18%; vertical-align: top;">MENETAPKAN</td>
            <td style="width: 2%; vertical-align: top;">:</td>
            <td style="width: 80%; vertical-align: top;"></td>
          </tr>
          <tr style="font-size: 13px;">
            <td style="width: 18%; vertical-align: top;">PERTAMA</td>
            <td style="width: 2%; vertical-align: top;">:</td>
            <td style="width: 80%; vertical-align: top;">Menetapkan bengkel praktik sebagai TUK sesuai
              dengan
              Kompetensi
              dan skema sertifikasi yang telah ditetapkan sebagaimana dalam lampiran surat keputusan ini.</td>
          </tr>
          <tr style="font-size: 13px;">
            <td style="width: 18%; vertical-align: top;">KEDUA</td>
            <td style="width: 2%; vertical-align: top;">:</td>
            <td style="width: 80%; vertical-align: top;">Tempat Uji Kompetensi telah terverifikasi dengan
              memenuhi syarat
              sesuai kebutuhan skema sertifikasi pada kompetensinya sehingga dapat menjamin terlaksananya
              Sertifikasi Profesi Kompetensi berdasarkan skema sertifikasi yang akan diujikan.</td>
          </tr>
          <tr style="font-size: 13px;">
            <td style="width: 18%; vertical-align: top;">KETIGA</td>
            <td style="width: 2%; vertical-align: top;">:</td>
            <td style="width: 80%; vertical-align: top;">Surat Keputusan ini berlaku sejak tanggal
              ditetapkan
              dan apabila
              terdapat kesalahan dalam penetapan ini akan diadakan perubahan seperlunya.</td>
          </tr>
          <tr style="font-size: 13px;">
            <td></td>
            <td></td>
            <td>
              <div style="text-align: right; margin-right: 50px">
                <table style="width: 100%">
                  <tr style="text-align: right">
                    <td>Ditetapkan di</td>
                    <td style="width: 5%">:</td>
                    <td style="width: 30%; text-align: left;">{{ $sk_penetapan_tuk->tempat_ditetapkan }}
                    </td>
                  </tr>
                  <tr style="text-align: right">
                    <td>Pada tanggal</td>
                    <td style="width: 5%">:</td>
                    <td style="width: 30%; text-align: left;">
                      {{ $sk_penetapan_tuk->tanggal_ditetapkan->format('d F Y') }}</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="text-align: left;">
                      <div style="margin-left: 248px">
                        <div>
                          <span>{{ $sk_penetapan_tuk->jabatan_bttd }}</span>
                        </div>
                        <div style="height: 90px"><img src="{{ $sk_penetapan_tuk->ttd }}" alt="ttd"
                            style="width: 140px; margin-left: -10px; margin-top: -2px">
                        </div>
                        <div>
                          <span>{{ $sk_penetapan_tuk->nama_bttd }}</span>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
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
    </tr>
  </table>
  <hr />

  <table>
    <tbody style="font-size: 13px">
      <tr>
        <td colspan="3">
          <h6 style="margin: 0; font-weight: lighter;">Lampiran SK</h6>
          </h6>
        </td>
      </tr>
      <tr>
        <td style="width: 8%">
          <h6 style="margin: 0; font-weight: lighter;">Nomor</h6>
        </td>
        <td style="width: 2%">
          <h6 style="margin: 0; font-weight: lighter;">:</h6>
        </td>
        <td style="width: 90%" class="text-left">
          <h6 style="margin: 0; font-weight: lighter;">{{ $sk_penetapan_tuk->no_sk }}</h6>
        </td>
      </tr>
      <tr>
        <td>
          <h6 style="margin: 0; font-weight: lighter;">Tanggal</h6>
        </td>
        <td>
          <h6 style="margin: 0; font-weight: lighter;">:</h6>
        </td>
        <td>
          <h6 style="margin: 0; font-weight: lighter;">{{ $sk_penetapan_tuk->tanggal_ditetapkan->format('d F Y') }}
          </h6>
        </td>
      </tr>
    </tbody>
  </table>
  <div>
    <div>
      <h6 style="text-align: center; margin: 0; font-size: 16px; margin-top: 10px">PENEMPATAN TEMPAT UJI KOMPETENSI
        (TUK) TERVERIFIKASI
      </h6>
      <h6 style="text-align: center; margin: 0; font-size: 16px; margin-bottom: 10px">LSP SMK NEGERI 1 SINTANG</h6>
      {{--  --}}
      <table style="margin: 0 auto; font-size: 15px" cellpadding='5' cellspacing='0' border="1px solid black">
        <thead>
          <tr style="text-align: center; ">
            <th>NO</th>
            <th>NAMA TUK</th>
            <th>NAMA SKEMA SERTIFIKASI</th>
            <th>TEMPAT</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sk_penetapan_tuk->relasi_sk_penetapan_tuk_child as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->relasi_nama_tuk->nama_tuk }}</td>
              <td>{{ $item->relasi_skema_sertifikasi->judul_skema_sertifikasi }}</td>
              <td>{{ $item->tempat }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
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
                  <td style="width: 30%; text-align: left;">{{ $sk_penetapan_tuk->tempat_ditetapkan }}
                  </td>
                </tr>
                <tr style="text-align: right">
                  <td>Pada tanggal</td>
                  <td style="width: 5%">:</td>
                  <td style="width: 30%; text-align: left;">
                    {{ $sk_penetapan_tuk->tanggal_ditetapkan->format('d F Y') }}</td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align: left;">
                    <div style="margin-left: 248px">
                      <div>
                        <span>{{ $sk_penetapan_tuk->jabatan_bttd }}</span>
                      </div>
                      <div style="height: 90px"><img src="{{ $sk_penetapan_tuk->ttd }}" alt="ttd"
                          style="width: 140px; margin-left: -10px; margin-top: -2px">
                      </div>
                      <div>
                        <span>{{ $sk_penetapan_tuk->nama_bttd }}</span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </td>
        </tr>
      </table>
      {{--  --}}
    </div>
  </div>
</body>

</html>
