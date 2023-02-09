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
        Schema::create('z_ba_pecah_rp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institusi_id')->constrained('institusi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('skema_sertifikasi_id')->constrained('skema_sertifikasi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('nama_tuk_id')->constrained('nama_tuk')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl_tes_tertulis');
            $table->date('tgl_tes_praktek');
            $table->integer('jml_asesi');
            $table->time('wkt_mulai_uk');
            $table->time('wkt_selesai_uk');
            $table->string('jabatan_bttd');
            $table->string('nama_bttd');
            $table->string('no_met_bttd');
            $table->string('tempat_rapat');
            $table->string('topik');
            $table->string('ketua_rapat');
            $table->string('notulis');
            $table->string('no_met_notulis');
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
        Schema::dropIfExists('z_ba_pecah_rp');
    }
};
