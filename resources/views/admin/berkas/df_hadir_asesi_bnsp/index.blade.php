<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>NAMA ASESI</th>
        <th>NIK</th>
        <th>TEMPAT LAHIR</th>
        <th>TANGGAL LAHIR (dd/mm/yyyy)</th>
        <th>JENIS KELAMIN (L/P)</th>
        <th>TEMPAT TINGGAL</th>
        <th>KODE KOTA</th>
        <th>KODE PROVINSI</th>
        <th>TELP</th>
        <th>EMAIL</th>
        <th>KODE PENDIDIKAN</th>
        <th>KODE PEKERJAAN</th>
        <td>KODE JADWAL</td>
        <th>TANGGAL UJI (hh/bb/yyyy)</th>
        <th>NOMOR REGISTRASI ASESOR</th>
        <th>KODE SUMBER ANGGARAN</th>
        <th>KODE KEMENTERIAN</th>
        <th>K/BK</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->nama_lengkap ?? '' }}</td>
          <td>{{ $user->relasi_user_detail->ktp_nik_paspor ?? '' }}</td>
          <td>{{ $user->relasi_user_detail->tempat_lahir ?? '' }}</td>
          @php
            if ($user->relasi_user_detail->tanggal_lahir) {
                $tanggal_lahir = Carbon\Carbon::parse($user->relasi_user_detail->tanggal_lahir)->format('d/m/Y');
            } else {
                $tanggal_lahir = '';
            }
          @endphp
          <td>{{ $tanggal_lahir }}</td>
          @php
            if ($user->relasi_user_detail->jenis_kelamin) {
                $jenis_kelamin = $user->relasi_user_detail->jenis_kelamin == 'laki-laki' ? 'L' : 'P';
            } else {
                $jenis_kelamin = '';
            }
          @endphp
          <td>{{ $jenis_kelamin }}</td>
          <td>{{ $user->relasi_user_detail->alamat_rumah ?? '-' }}</td>
          <td>{{ $user->relasi_user_detail->kode_kota ?? '-' }}</td>
          <td>{{ $user->relasi_user_detail->kode_provinsi ?? '-' }}</td>
          <td>{{ $user->relasi_user_detail->nomor_hp ?? '-' }}</td>
          <td>{{ $user->email ?? '-' }}</td>
          <td>{{ $user->relasi_user_detail->kode_pendidikan ?? '-' }}</td>
          <td>{{ $user->relasi_user_detail->kode_pekerjaan ?? '-' }}</td>
          <td>{{ $user->relasi_user_detail->kode_jadwal ?? '-' }}</td>
          <td>{{ $user->relasi_asesi_uji_kompetensi->relasi_pelaksanaan_ujian->tanggal->isoFormat('DD/MM/Y') }}</td>
          <td>{{ $user->relasi_user_detail->no_reg ?? '-' }}</td>
          <td>{{ $user->relasi_user_detail->kode_sumber_anggaran ?? '-' }}</td>
          <td>{{ $user->relasi_user_detail->kode_kementerian ?? '-' }}</td>
          <td>{{ $user->relasi_koreksi_jawaban->status_kompeten == 1 ? 'K' : 'BK' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
