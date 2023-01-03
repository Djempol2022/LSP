<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Sekolah;
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
            'nama_role' => 'admin'
        ]);
        Role::create([
            'nama_role' => 'peninjau'
        ]);
        Role::create([
            'nama_role' => 'asesor'
        ]);
        Role::create([
            'nama_role' => 'asesi'
        ]);
        Sekolah::create([
            'nama_sekolah' => 'SMK NEGERI 1 SINTANG'
        ]);
        Sekolah::create([
            'nama_sekolah' => 'SMK NEGERI 2 SINTANG'
        ]);
        Sekolah::create([
            'nama_sekolah' => 'SMK NEGERI 3 PONTIANAK'
        ]);
        Jurusan::factory(20)->create();

        User::create([
            'nama_lengkap' => 'admin',
            'institusi_id' => '1',
            'jurusan_id' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => '1'
        ]);

        User::create([
            'nama_lengkap' => 'peninjau',
            'institusi_id' => '1',
            'jurusan_id' => '1',
            'email' => 'peninjau@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => '2'
        ]);

        User::create([
            'nama_lengkap' => 'asesor',
            'institusi_id' => '1',
            'jurusan_id' => '1',
            'email' => 'asesor@gmail.com',
            'password' => Hash::make('12345678'),
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
    }
}
