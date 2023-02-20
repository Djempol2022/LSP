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
        Schema::create('df_hadir_asesi', function (Blueprint $table) {
            $table->id();
            $table->date('tgl')->nullable();
            $table->time('waktu')->nullable();
            $table->string('tempat')->nullable();
            $table->foreignId('skema_sertifikasi_id')->nullable()->constrained('skema_sertifikasi')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jabatan_bttd');
            $table->string('nama_bttd');
            $table->string('no_met_bttd');
            $table->text('ttd_bttd');
            $table->string('nama_asesor')->nullable();
            $table->string('no_met_asesor')->nullable();
            $table->text('ttd_asesor')->nullable();
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
        Schema::dropIfExists('df_hadir_asesi');
    }
};
