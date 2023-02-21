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
        Schema::create('koreksi_jawaban', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_uji_kompetensi_id')->constrained('jadwal_uji_kompetensi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_asesi_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('status_kompeten')->nullable();
            $table->text('tanggal')->nullable();
            $table->text('ttd_asesor');
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
        Schema::dropIfExists('koreksi_jawaban');
    }
};
