<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Print Sertifikat to PDF</title>

  <style>
    .page-break {
      page-break-after: always;
    }

    table {
      border-left: 0.01em solid #000000;
      border-right: 0;
      border-top: 0.01em solid #000000;
      border-bottom: 0;
      border-collapse: collapse;
    }

    table td,
    table th {
      border-left: 0;
      border-right: 0.01em solid #000000;
      border-top: 0;
      border-bottom: 0.01em solid #000000;
    }
  </style>
</head>

<body>
  @foreach ($data as $item)
    {{-- @dd($item['user']->nama_lengkap) --}}
    <div style="text-align: center">
      <p style="margin-top: 270px">No. {{ $item['user']->relasi_user_detail->no_sertifikat ?? '-' }}</p>
      <p style="margin-bottom: -15px; margin-top: 40px">Dengan ini menyatakan bahwa,</p>
      <p style="font-style: italic">This is to certify that,</p>
      <h2 style="font-weight: bold; margin-top: 20px; margin-bottom: -15px">{{ $item['user']->nama_lengkap }}</h2>
      <p>No. Reg. KTL.{{ $item['user']->relasi_user_detail->no_reg ?? '-' }}</p>
      <p style="margin-top: 20px; margin-bottom: -15px;">Telah kompeten pada bidang :</p>
      <p style="margin-bottom: -15px; font-style: italic">Is competent in the area of :</p>
      <h3 style="font-weight: bold; margin-bottom: -15px">
        {{ $item['user']->relasi_jurusan->jurusan ?? 'Tidak ada data Jurusan' }}
      </h3>
      <p style="font-style: italic">{{ $item['jurusan'] }}</p>
      <p style="margin-top: 25px; margin-bottom: -15px">Dengan Kualifikasi / Kompetensi :</p>
      <p style="margin-bottom: -15px; font-style: italic">With Qualification / Competency :</p>
      <h3 style="font-weight: bold; margin-bottom: -15px;">
        {{ $item['user']->relasi_asesi_uji_kompetensi->relasi_jadwal_uji_kompetensi->relasi_muk->muk }}
      </h3>
      <p style="margin-bottom: -15px; font-style: italic">{{ $item['muk'] }}</p>
      <p style="margin-bottom: -15px">Sertifikat ini berlaku untuk : 3 (tiga) Tahun</p>
      <p style="font-style: italic">This certificate is valid for : 3 (three) Years</p>
      <p style="margin-top: 35px; margin-bottom: -15px">Sintang, {{ Carbon\Carbon::now()->isoFormat('DD MMMM Y') }}</p>
      <p style="margin-bottom: -15px">Atas nama (on behalf of) BNSP :</p>
      <p style="margin-bottom: -15px">Lembaga Sertifikasi Profesi SMKN 1 Sintang</p>
      <p style="font-style: italic">Profesional Certification Authority of SMKN 1 Sintang</p>
      <h4 style="margin-top: 60px; text-decoration: underline; font-weight: bold; margin-bottom: -15px">Agus Pramono,
        ST.,M.Pd</h4>
      <p style="margin-bottom: -15px;">Ketua</p>
      <p style="font-style: italic">Chairman</p>
    </div>

    <div class="page-break"></div>

    <h4 style="text-align: center; margin-top: 30px; margin-bottom: -20px">Daftar Unit Kompetensi</h4>
    <h4 style="text-align: center; font-style: italic; margin-bottom: 50px; font-weight: lighter">List of Unit(s) of
      Competency</h4>

    <div style="width: 85%; margin: 0 auto;">
      <table style="margin: 0 auto; font-size: 15px; width: 100%" cellpadding='5' cellspacing='0'>
        <thead>
          <tr style="text-align: center">
            <th style="padding: 3px 5px">NO</th>
            <th style="padding: 3px 5px">Kode Unit Kompetensi <br /><span style="font-weight: lighter">Code of
                Competency
                Unit</span></th>
            <th style="padding: 3px 5px">Judul Unit Kompetensi <br /><span style="font-weight: lighter">Title of
                Competency
                Unit</span></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($item['user']->relasi_skema_sertifikasi->relasi_unit_kompetensi as $unit_kompetensi)
            <tr>
              <td style="text-align: center">{{ $loop->iteration }}</td>
              <td>{{ $unit_kompetensi->kode_unit }}</td>
              <td>{{ $unit_kompetensi->judul_unit }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div style="margin-top: 120px">
        <div style="width: 85px; height: 100px; border: 2px solid #000000; margin-bottom: -15px">
          <img src="{{ $item['foto'] }}" alt="foto" style="width: 85px; height: 100px;">
        </div>
        <div style="text-align: left; width: 100%; margin-left: 40px">
          <div style="text-align: center; width: 40%">
            <p style="text-decoration: underline; font-weight: bolder; margin-bottom: -15px">
              {{ $item['user']->nama_lengkap }}
            </p>
            <p style="margin-bottom: -15px">Tanda tangan pemilik</p>
            <p style="font-style: italic; margin-bottom: -15px">Signature of holder</p>
          </div>
        </div>
      </div>
    </div>

    @if (!$loop->last)
      <div class="page-break"></div>
    @endif
  @endforeach


</body>

</html>
