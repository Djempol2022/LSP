<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\Institusi;
use App\Models\JadwalUjiKompetensi;
use App\Models\Kebangsaan;
use App\Models\KualifikasiPendidikan;
use App\Models\MateriUjiKompetensi;
use App\Models\NamaTempatUjiKompetensi;
use App\Models\Pekerjaan;
use App\Models\Sertifikasi;
use App\Models\SkemaSertifikasi;
use App\Models\TempatUjiKompetensi;
use App\Models\UnitKompetensi;
use App\Models\UnitKompetensiIsi;
use App\Models\UnitKompetensiSub;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'admin'
        ]);
        Role::create([
            'role' => 'peninjau'
        ]);
        Role::create([
            'role' => 'asesor'
        ]);
        Role::create([
            'role' => 'asesi'
        ]);
        Institusi::create([
            'nama_institusi' => 'SMK NEGERI 1 SINTANG',
            'alamat_institusi' => 'Jl.',
            'kode_pos' => '3433',
            'nomor_hp_institusi' => '2123453453',
            'email_institusi' => 'institusi@gmail.com'
        ]);
        Institusi::create([
            'nama_institusi' => 'SMK NEGERI 2 SINTANG',
            'alamat_institusi' => 'Jl.',
            'kode_pos' => '3433',
            'nomor_hp_institusi' => '2123453453',
            'email_institusi' => 'institusi@gmail.com'
        ]);
        Institusi::create([
            'nama_institusi' => 'SMK NEGERI 3 PONTIANAK',
            'alamat_institusi' => 'Jl.',
            'kode_pos' => '3433',
            'nomor_hp_institusi' => '2123453453',
            'email_institusi' => 'institusi@gmail.com'
        ]);
        Jurusan::factory(20)->create();

        User::create([
            'nama_lengkap' => 'admin',
            'institusi_id' => '1',
            'jurusan_id' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('22222222'),
            'role_id' => '1'
        ]);

        User::create([
            'nama_lengkap' => 'peninjau',
            'institusi_id' => '1',
            'jurusan_id' => '1',
            'email' => 'peninjau@gmail.com',
            'password' => Hash::make('22222222'),
            'role_id' => '2'
        ]);

        User::create([
            'nama_lengkap' => 'asesor',
            'institusi_id' => '1',
            'jurusan_id' => '1',
            'email' => 'asesor@gmail.com',
            'password' => Hash::make('22222222'),
            'role_id' => '3'
        ]);

        User::create([
            'nama_lengkap' => 'asesi',
            'institusi_id' => '1',
            'jurusan_id' => '1',
            'email' => 'asesi@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => '4'
        ]);

        User::create([
            'nama_lengkap' => 'asesi2',
            'institusi_id' => '1',
            'jurusan_id' => '1',
            'email' => 'asesi2@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => '4'
        ]);

        UserDetail::create([
            'user_id' => 4,
            'ktp_nik_paspor' => '32019170233',
            'tempat_lahir' => 'Sambas',
            'jenis_kelamin' => 'laki-laki',
            'alamat_rumah' => 'Tanray',
            'nomor_hp' => '081256607174',
        ]);

        UserDetail::create([
            'user_id' => 5,
            'ktp_nik_paspor' => '32019170213',
            'tempat_lahir' => 'Sambas',
            'jenis_kelamin' => 'laki-laki',
            'alamat_rumah' => 'Tanray',
            'nomor_hp' => '081256607222',
        ]);

        Pekerjaan::create([
            'id' => 1,
            'user_id' => 4,
            'nama_institusi' => 'aa',
            'alamat_institusi' => 'aab',
            'jabatan' => 'Ketua',
            'kode_pos' => '3333',
            'nomor_hp_institusi' => '081256607271',
            'email_institusi' => 'aa@gmail.com',
        ]);

        KualifikasiPendidikan::create([
            'pendidikan' => 'SD'
        ]);

        KualifikasiPendidikan::create([
            'pendidikan' => 'SMP'
        ]);

        KualifikasiPendidikan::create([
            'pendidikan' => 'SMK'
        ]);

        Kebangsaan::create([
            'kebangsaan' => 'Indonesia'
        ]);

        Kebangsaan::create([
            'kebangsaan' => 'Malaysia'
        ]);

        Kebangsaan::create([
            'kebangsaan' => 'Singapore'
        ]);

        SkemaSertifikasi::create([
            'judul_skema_sertifikasi' => 'Skema Sertifikasi KKNI Level II Pada Kompetensi Keahlian Multimedia',
            'nomor_skema_sertifikasi' => 'MM-06/LSP.SMKN1-STG/2020',
            'jurusan_id' => 1,
        ]);

        SkemaSertifikasi::create([
            'judul_skema_sertifikasi' => 'Skema Sertifikasi KKNI Level II Pada Kompetensi Keahlian TEKNIK INSTALASI TENAGA LISTRIK',
            'nomor_skema_sertifikasi' => 'ITL-06/LSP.SMKN1-STG/2020',
            'jurusan_id' => 2,
        ]);

        Sertifikasi::create([
            'user_id' => 4,
            'skema_sertifikasi_id' => 1,
            'tujuan_asesmen' => 'sertifikasi',
            'tanggal' => '2023-01-13'
        ]);

        UnitKompetensi::create([
            'sertifikasi_id' => 1,
            'kode_unit' => 'TIK.MM01.007.01',
            'judul_unit' => 'Memilih dan Memakai Software Dan Hardware Untuk Multimedia',
            'jenis_standar' => 'SKKNI',
        ]);

        UnitKompetensiSub::create([
            'unit_kompetensi_id' => 1,
            'judul_unit_kompetensi_sub' => 'Mengembangkan Persyaratan Fungsi',
        ]);

        UnitKompetensiSub::create([
            'unit_kompetensi_id' => 1,
            'judul_unit_kompetensi_sub' => 'Memilih peralatan',
        ]);

        UnitKompetensiIsi::create([
            'unit_kompetensi_sub_id' => 1,
            'judul_unit_kompetensi_isi' => 'Persyaratan  fungsi  yang  akurat,  komplit  dan sesuai  prioritas    diidentifikasi  sesuai  keperluan dengan referensi semua tipe media.',
        ]);

        UnitKompetensiIsi::create([
            'unit_kompetensi_sub_id' => 1,
            'judul_unit_kompetensi_isi' => 'Persyaratan  yang  berlawanan  dan  overlapping diidentifikasi.',
        ]);

        UnitKompetensiIsi::create([
            'unit_kompetensi_sub_id' => 1,
            'judul_unit_kompetensi_isi' => 'Persyaratan fungsi didokumentasi dan divalidasi oleh klien.',
        ]);

        UnitKompetensiIsi::create([
            'unit_kompetensi_sub_id' => 1,
            'judul_unit_kompetensi_isi' => 'Sumber-sumber  dan  pembiayaan  yang  tersedia diidentifikasi dan divalidasi oleh klien.',
        ]);

        UnitKompetensiIsi::create([
            'unit_kompetensi_sub_id' => 2,
            'judul_unit_kompetensi_isi' => 'Produk-produk  dan  peralatan  yang  relevan diidentifikasi  dan  dievaluasi  dengan  referensi persyaratan fungsi.',
        ]);

        UnitKompetensiIsi::create([
            'unit_kompetensi_sub_id' => 2,
            'judul_unit_kompetensi_isi' => 'Kemandirian  produk  dan  peralatan  diidentifikasi dan dianalisa dengan referensi pada persyaratan fungsi dan arsitektur sistem.',
        ]);

        UnitKompetensiIsi::create([
            'unit_kompetensi_sub_id' => 2,
            'judul_unit_kompetensi_isi' => 'Produk  terbaik  dan  solusi  peralatan,  termasuk keterbatasan-keterbatasan  diidentifikasi  dan didokumentasikan',
        ]);

        UnitKompetensiIsi::create([
            'unit_kompetensi_sub_id' => 2,
            'judul_unit_kompetensi_isi' => 'Peralatan  dipilih  dan  dipesan  sebagaimana diperlukan  sehubungan  dengan  kebijaksanaan perusahaan penjualan.',
        ]);

        MateriUjiKompetensi::create([
            'muk' => 'Klaster Desain Grafis',
            'jurusan_id' => 1
        ]);

        MateriUjiKompetensi::create([
            'muk' => 'Klaster Pengolahan Audio Video',
            'jurusan_id' => 2
        ]);

        MateriUjiKompetensi::create([
            'muk' => 'Klaster Animasi',
            'jurusan_id' => 3
        ]);

        JadwalUjiKompetensi::create([
            'muk_id' => 1,
            'sesi' => 1,
            'tanggal' => '2023-01-27',
            'waktu_mulai' => '07:00',
            'waktu_selesai' => '09:00',
            'kelas' => 'IA',
            'tempat' => 'POLNEP',
            'jenis_tes' => 'Tertulis'
        ]);
        JadwalUjiKompetensi::create([
            'muk_id' => 2,
            'sesi' => 2,
            'tanggal' => '2023-01-27',
            'waktu_mulai' => '09:00',
            'waktu_selesai' => '11:00',
            'kelas' => 'IA',
            'tempat' => 'POLNEP',
            'jenis_tes' => 'Tertulis'
        ]);
        JadwalUjiKompetensi::create([
            'muk_id' => 3,
            'sesi' => 3,
            'tanggal' => '2023-01-27',
            'waktu_mulai' => '13:00',
            'waktu_selesai' => '14:00',
            'kelas' => 'IA',
            'tempat' => 'POLNEP',
            'jenis_tes' => 'Tertulis'
        ]);

        NamaTempatUjiKompetensi::create([
            'nama_tuk' => 'TUK TEKNIK INSTALASI TENAGA LISTRIK',
        ]);

        NamaTempatUjiKompetensi::create([
            'nama_tuk' => 'TUK TEKNIK KENDARAAN RINGAN OTOMOTIF',
        ]);

        NamaTempatUjiKompetensi::create([
            'nama_tuk' => 'TUK TEKNIK PEMESINAN',
        ]);
    }
}
