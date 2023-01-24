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
        Schema::create('df_tuk_terverifikasi_child', function (Blueprint $table) {
            $table->id();
            $table->foreignId('df_tuk_terverifikasi_id')->constrained('df_tuk_terverifikasi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('nama_tuk_id')->constrained('nama_tuk')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('skema_sertifikasi_id')->constrained('skema_sertifikasi')->onDelete('cascade')->onUpdate('cascade');
            $table->string('penanggung_jawab');
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
        Schema::dropIfExists('df_tuk_terverifikasi_child');
    }
};
