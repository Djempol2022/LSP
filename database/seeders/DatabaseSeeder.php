<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\Institusi;
use App\Models\Pekerjaan;
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
            'nama_lengkap' => 'Hendra Afrizal',
            'ktp_nik_paspor' => '32019170233',
            'tempat_lahir' => 'Sambas',
            'jenis_kelamin' => 'laki-laki',
            'kebangsaan' => 'Indonesia',
            'alamat_rumah' => 'Tanray',
            'nomor_hp' => '081256607174',
            'kualifikasi_pendidikan' => 'D3'
        ]);

        UserDetail::create([
            'user_id' => 5,
            'nama_lengkap' => 'Vinz',
            'ktp_nik_paspor' => '32019170213',
            'tempat_lahir' => 'Sambas',
            'jenis_kelamin' => 'laki-laki',
            'kebangsaan' => 'Indonesia',
            'alamat_rumah' => 'Tanray',
            'nomor_hp' => '081256607222',
            'kualifikasi_pendidikan' => 'D3'
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
    }
}
