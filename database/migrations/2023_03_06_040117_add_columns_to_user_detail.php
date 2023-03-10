<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_detail', function (Blueprint $table) {
            $table->integer('kode_kota')->nullable()->after('no_reg');
            $table->integer('kode_provinsi')->nullable()->after('kode_kota');
            $table->integer('kode_pendidikan')->nullable()->after('kode_provinsi');
            $table->integer('kode_pekerjaan')->nullable()->after('kode_pendidikan');
            $table->integer('kode_jadwal')->nullable()->after('kode_pekerjaan');
            $table->integer('kode_sumber_anggaran')->nullable()->after('kode_jadwal');
            $table->integer('kode_kementerian')->nullable()->after('kode_sumber_anggaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_detail', function (Blueprint $table) {
            //
        });
    }
};
