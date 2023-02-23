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
        Schema::create('p_muk_pendekatan_asesmen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skema_sertifikasi_id')->constrained('skema_sertifikasi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('kandidat');
            $table->integer('tujuan');
            $table->integer('konteks_asesmen_lingkungan');
            $table->integer('konteks_asesmen_peluang');
            $table->integer('konteks_asesmen_hubungan');
            $table->integer('konteks_asesmen_siapa');
            $table->integer('konfirmasi');
            $table->integer('tolok');
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
        Schema::dropIfExists('p_muk_pendekatan_asesmen_1');
    }
};
