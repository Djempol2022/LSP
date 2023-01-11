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
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->text('ktp_nik_paspor')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->text('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('kebangsaan')->nullable();
            $table->text('alamat_rumah')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('kualifikasi_pendidikan');
            $table->string('foto')->nullable();
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
