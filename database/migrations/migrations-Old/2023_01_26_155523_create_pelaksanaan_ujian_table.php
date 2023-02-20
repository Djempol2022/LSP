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
        Schema::create('pelaksanaan_ujian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_uji_kompetensi_id')->constrained('jadwal_uji_kompetensi')->onUpddate('cascade')->onDelete('cascade');
            $table->string('sesi')->nullable();
            $table->text('tanggal')->nullable();
            $table->text('waktu_mulai')->nullable();
            $table->text('waktu_selesai')->nullable();
            $table->text('total_waktu')->nullable();
            $table->string('kelas')->nullable();
            $table->string('tempat')->nullable();
            $table->integer('jenis_tes')->nullable();
            $table->integer('acc')->nullable();
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
        Schema::dropIfExists('pelaksanaan_ujian');
    }
};
