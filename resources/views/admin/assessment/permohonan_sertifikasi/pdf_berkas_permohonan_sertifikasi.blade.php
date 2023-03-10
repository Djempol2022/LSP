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
                <h2 style="margin: 0px; font-family: serif; font-weight: bolder; color: grey; font-size: 24px;">SMK
                    Negeri 1
                    Sintang</h2>
                <h5 style="margin: 0px; color: grey; font-weight: lighter; font-size: 15px;">Jalan Raya Sintang -
                    Pontianak KM.8
                    Sintang</h5>
                <h5 style="margin: 0px; color: grey; font-weight: lighter; font-size: 15px;">Telp.: (0565)21377, Fax:
                    (0565)21377</h5>
            </td>
            <td>@include('layout.image-base64.img-logo-bnsp')</td>
        </tr>
    </table>
    <hr />

    <div style="text-align: center; font-size: 15px;">
        <h4 style="margin-top: 10px;">FR.APL.01. PERMOHONAN SERTIFIKASI KOMPETENSI
        </h4>
    </div>
    <div style="padding: 5%; padding-top:0% ">
    {{-- LEMBAR 1 --}}
        <h6 style="margin: 0%; margin-bottom: 1%; padding:0%;">Bagian 1 : Rincian Data Pemohon Sertifikasi</h6>
        <h6 style="margin: 0%; margin-bottom: 1%; padding:0%;"><b>a. Data Pribadi</b></h6>

        <table style="table-layout: fixed; font-size: 13px; width: 100%; margin-bottom:5%" cellspacing=0 cellpadding=5 border="1">
            <tbody style="font-size: 13px">
                <tr>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: lighter;">Nama Lengkap</h6>
                    </td>
                    <td>
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->nama_lengkap }}
                        </h6>
                    </td>
                </tr>

                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">No. KTP/NIK/Paspor</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_user_detail->ktp_nik_paspor }}</h6>
                    </td>
                </tr>

                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Tempat /tgl.Lahir</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_user_detail->tempat_lahir }} /
                            {{ $data_permohonan_user_sertifikasi->relasi_user_detail->tanggal_lahir }}</h6>
                    </td>
                </tr>

                <tr>
                    <td style="width: 20%">
                    <h6 style="margin: 0; font-weight: lighter;">Jenis Kelamin</h6>
                    </td>
                    <td style="width: 5%">
                    <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                    <h6 style="margin: 0; font-weight: lighter;">@if($data_permohonan_user_sertifikasi->relasi_user_detail->jenis_kelamin == "laki-laki")Laki-Laki / <s>Wanita</s>@else <s>Laki-Laki</s> / Wanita @endif</h6>
                    </td>
                </tr>

                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Kebangsaan</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_user_detail->relasi_kebangsaan->kebangsaan }}
                        </h6>
                    </td>
                </tr>

                <tr>
                    <td rowspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Alamat Rumah</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_user_detail->alamat_rumah }}</h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Kode Pos : {{ $data_permohonan_user_sertifikasi->relasi_user_detail->kode_pos }}</h6>
                    </td>
                </tr>

                <tr>
                    <td rowspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">No. Telepon/E-mail</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: lighter;">Rumah :
                            {{ $data_permohonan_user_sertifikasi->relasi_user_detail->nomor_hp }}</h6>
                    </td>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: lighter;">Kantor : </h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td style="width: 10%">
                        <h6 style="margin: 0; font-weight: lighter;">HP :
                            {{ $data_permohonan_user_sertifikasi->relasi_user_detail->nomor_hp }}</h6>
                    </td>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">E-mail :
                            {{ $data_permohonan_user_sertifikasi->email }}</h6>
                    </td>
                </tr>

                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Kualifikasi Pendidikan</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_user_detail->relasi_kualifikasi_pendidikan->pendidikan }}
                        </h6>
                    </td>
                </tr>
            </tbody>
        </table>

        <h6 style="margin: 0%; margin-bottom: 1%; padding:0%;"><b>b. Data Pekerjaan Sekarang</b></h6>
        <table style="font-size: 13px; width: 100%" cellspacing=0 cellpadding=5 border="1">
            <tbody style="font-size: 13px">
                <tr>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: lighter;">Nama Institusi / Perusahaan</h6>
                    </td>
                    <td>
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->nama_pekerjaan }}
                        </h6>
                    </td>
                </tr>

                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Jabatan</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->jabatan }}</h6>
                    </td>
                </tr>

                <tr>
                    <td rowspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Alamat Kantor</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->alamat_pekerjaan }}</h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Kode Pos : {{$data_permohonan_user_sertifikasi->relasi_pekerjaan->kode_pos}}</h6>
                    </td>
                </tr>

                <tr>
                    <td rowspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">No. Telp/Fax/E-mail</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: lighter;">Telp :
                            {{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->nomor_hp_pekerjaan }}</h6>
                    </td>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: lighter;">Fax : </h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">E-mail :
                            {{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->email_pekerjaan }}</h6>
                    </td>
                </tr>

            </tbody>
        </table>
    {{-- AKHIR LEMBAR 1 --}}

        <div class="page-break"></div>

    {{-- LEMBAR 2 --}}
        <h6 style="margin: 0%; margin-bottom: 1%; padding:0%;">Bagian 2 : Data Sertifikasi</h6>
        <table border="1" style="font-size: 13px; width: 100%; margin-bottom:5%;" cellspacing=0 cellpadding=5>
            <tbody style="font-size: 13px">
                <tr>
                    <td rowspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Skema Sertifikasi (KKNI/Okupasi/Klaster)</h6>
                    </td>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Judul</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_jurusan->relasi_skema_sertifikasi->judul_skema_sertifikasi }}
                        </h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Nomor</h6>
                    </td>
                    <td style="width: 10%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_jurusan->relasi_skema_sertifikasi->nomor_skema_sertifikasi }}
                        </h6>
                    </td>
                </tr>

                <tr>
                    <td rowspan="5" colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Tujuan Asesmen</h6>
                    </td>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;">:</h6>
                    </td>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: bold;"><b>Sertifikasi</b></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;"></h6>
                    </td>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: lighter;">Sertifikasi Ulang</h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;"></h6>
                    </td>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: lighter;">Pengakuan Kompetensi Terkini (PKT)</h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;"></h6>
                    </td>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: lighter;">Rekognisi Pembelajaran Lampau</h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%">
                        <h6 style="margin: 0; font-weight: lighter;"></h6>
                    </td>
                    <td style="width: 30%">
                        <h6 style="margin: 0; font-weight: lighter;">Lainnya</h6>
                    </td>
                </tr>

            </tbody>
        </table>

        <h6 style="margin: 0%; margin-bottom: 1%; padding:0%;">Daftar Unit Kompetensi sesuai kemasan:</h6>
        <table border="1" style=" font-size: 13px; width: 100%;" cellspacing=0
            cellpadding=5>
            <thead style="font-size: 14px">
                <tr>
                    <th><h6 style="margin: 0%; padding:0%;">No</h6></th>
                    <th><h6 style="margin: 0%; padding:0%;">Kode unit</h6></th>
                    <th><h6 style="margin: 0%; padding:0%;">Judul Unit</h6></th>
                    <th><h6 style="margin: 0%; padding:0%;" style="text-wrap">Jenis Standar(Standar khusus/Standar
                        internasional/SKKNI)</h6></th>
                </tr>
            </thead>
            <tbody style="font-size: 13px">
                @php
                    $unit_kompetensi = \App\Models\UnitKompetensi::where('skema_sertifikasi_id',
                    $data_permohonan_user_sertifikasi->relasi_jurusan->relasi_skema_sertifikasi->id)->get();
                    $i = 1;
                @endphp
                @foreach($unit_kompetensi as $data_unit_kompetensi)
                    <tr>
                        <td style="text-align: center">
                            <h6 style="margin: 0%; padding:0%; font-weight: lighter;">{{ $i++ }}</h6>
                        </td>
                        <td>
                            <h6 style="margin: 0%; padding:0%; font-weight: lighter;">{{ $data_unit_kompetensi->kode_unit }}</h6>
                        </td>
                        <td>
                            <h6 style="margin: 0%; padding:0%; font-weight: lighter;">{{ $data_unit_kompetensi->judul_unit }}</h6>
                        </td>
                        <td>
                            <h6 style="margin: 0%; padding:0%; font-weight: lighter;">{{ $data_unit_kompetensi->jenis_standar }}</h6>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="card-text">
            <h6 style="margin: 0%; margin-bottom: 1%; padding:0%;">Bagian 3 : Bukti Kelengkapan Pemohon</h6>
            <h6 style="margin: 0%; margin-bottom: 1%; padding:0%; font-weight: lighter;">Bukti Persyaratan Dasar Pemohon</h6>
        </p>
        <table border="1" style="table-layout: fixed; font-size: 13px; width: 100%; margin-bottom:5%" cellspacing=0
            cellpadding=3>
            <thead>
                <tr class="text-center">
                    <th rowspan="2"><h6 style="margin: 0%; padding:0%;">No.</h6></th>
                    <th rowspan="2"><h6 style="margin: 0%; padding:0%;">Bukti Persyaratan Dasar</h6></th>
                    <th colspan="2"><h6 style="margin: 0%; padding:0%;">Ada</h6></th>
                    <th rowspan="2"><h6 style="margin: 0%; padding:0%;">Tidak Ada</h6></th>
                </tr>
                <tr class="text-center">
                    <th><h6 style="margin: 0%; padding:0%;">Memenuhi Syarat</h6></th>
                    <th><h6 style="margin: 0%; padding:0%;">Tidak Memenuhi Syarat</h6></th>
                </tr>
            </thead>
            <tbody style="font-size: 13px">
                <tr>
                    <td>
                        <h6 style="margin: 0%; padding:0%; font-weight: lighter; text-align:center">1</h6>
                    </td>
                    <td>
                        <h6 style="margin: 0%; padding:0%; font-weight: lighter;">Fotocopy Nilai Mata Pelajaran Kompetensi Keahlian
                            {{ $data_permohonan_user_sertifikasi->relasi_jurusan->jurusan }}</h6>
                    </td>
                    <td>
                        <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔</h6>
                    </td>
                    <td>
                        {{-- <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;">Centang</h6> --}}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h6 style="margin: 0%; padding:0%; font-weight: lighter; text-align:center">2</h6>
                    </td>
                    <td>
                        <h6 style="margin: 0%; padding:0%; font-weight: lighter;">Fotocopy Sertifikat Prakerin atau surat keterangan telah
                            melaksanakan Praktek Kerja Industri</h6>
                    </td>
                    <td>
                        <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔</h6>
                    </td>
                    <td>
                        {{-- <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;">Centang</h6> --}}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h6 style="margin: 0%; padding:0%; font-weight: lighter; text-align:center">3</h6>
                    </td>
                    <td>
                        <h6 style="margin: 0%; padding:0%; font-weight: lighter;">Fotocopy Nilai Raport</h6>
                    </td>
                    <td>
                        <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔</h6>
                    </td>
                    <td>
                        {{-- <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;">Centang</h6> --}}
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    {{-- AKHIR LEMBAR 2 --}}

        <div class="page-break"></div>
    {{-- LEMBAR 3 --}}
        <table border="1" style="font-size: 13px; width: 100%; margin-bottom:2%" cellspacing=0 cellpadding=5>
            <tbody style="font-size: 13px">
                <tr>
                    <td rowspan="3" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;"><b style="font-weight: bold;">Rekomendasi (diisi oleh
                                LSP):</b>
                            Berdasarkan ketentuan persyaratan dasar, maka pemohon:
                            <b style="font-weight: bold;">Diterima/ <s>Tidak diterima</s> *)</b> sebagai peserta sertifikasi
                        </h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;"><b style="font-weight: bold;">Pemohon/ Kandidat :</b>
                        </h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Nama</h6>
                    </td>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->nama_lengkap }}
                        </h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Tanda Tangan/Tanggal</h6>
                    </td>
                    <td style="width: 20%">
                        <img src="{{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->ttd_asesi }}" alt="ttd"
                            width="80px">
                        <h6 style="margin: 0; font-weight: lighter;">{{ $tanggal }}</h6>
                    </td>
                </tr>

                <tr>
                    <td rowspan="4" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;"><b style="font-weight: bold;">Catatan :</b>
                            {{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->catatan }}
                        </h6>
                    </td>
                    <td colspan="2" style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;"><b style="font-weight: bold;">Admin LSP:</b></h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Nama</h6>
                    </td>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->nama_admin }}
                        </h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">No. Reg</h6>
                    </td>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->no_reg }}
                        </h6>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        <h6 style="margin: 0; font-weight: lighter;">Tanda Tangan/Tanggal</h6>
                    </td>
                    <td style="width: 20%">
                        <img src="{{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->ttd_admin }}"
                            alt="ttd" width="80px">
                        <h6 style="margin: 0; font-weight: lighter;">
                            {{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->tanggal }}
                        </h6>
                    </td>
                </tr>
            </tbody>
        </table>
    {{-- AKHIR LEMBAR 3 --}}
    </div>

</body>

</html>
