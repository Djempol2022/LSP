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
            'nama_role' => 'assesor'
        ]);
        Role::create([
            'nama_role' => 'assesi'
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
            'email' => 'admin@admin.com',
            'sekolah_id' => '1',
            'jurusan_id' => '1',
            'role_id' => '1',
            'password' => Hash::make('admin123')
        ]);
    }
}
