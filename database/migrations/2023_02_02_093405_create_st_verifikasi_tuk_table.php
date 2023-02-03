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
        Schema::create('st_verifikasi_tuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skema_sertifikasi_id')->constrained('skema_sertifikasi')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('no_surat');
            $table->string('tempat_uji');
            $table->date('tanggal_dilaksanakan');
            $table->string('tempat_ditetapkan');
            $table->date('tanggal_ditetapkan');
            $table->string('jabatan_bttd');
            $table->string('nama_bttd');
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
        Schema::dropIfExists('st_verifikasi_tuk');
    }
};
