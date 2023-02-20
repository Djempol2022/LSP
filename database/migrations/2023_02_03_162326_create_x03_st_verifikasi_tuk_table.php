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
        Schema::create('x03_st_verifikasi_tuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nama_tuk_id')->nullable()->constrained('nama_tuk')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_surat');
            $table->string('tempat_ditetapkan');
            $table->date('tanggal_ditetapkan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->time('waktu');
            $table->string('jabatan_bttd');
            $table->string('nama_bttd');
            $table->string('no_met_bttd');
            $table->text('ttd')->nullable();
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
        Schema::dropIfExists('x03_st_verifikasi_tuk');
    }
};
