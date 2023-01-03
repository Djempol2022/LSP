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
        Schema::create('users_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asesi_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->text('ktp_nik_paspor');
            $table->string('tempat_lahir');
            $table->text('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('kebangsaan');
            $table->text('alamat_rumah');
            $table->string('nomor_hp');
            $table->string('kualifikasi_pendidikan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_detail');
    }
};
