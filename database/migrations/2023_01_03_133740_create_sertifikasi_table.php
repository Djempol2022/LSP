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
        Schema::create('sertifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asesi_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->text('judul_skema_sertifikasi');
            $table->string('nomor_skema_sertifikasi');
            $table->string('tujuan_asesmen');
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
        Schema::dropIfExists('sertifikasi');
    }
};
