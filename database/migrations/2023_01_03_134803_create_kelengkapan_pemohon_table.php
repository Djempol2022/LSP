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
        Schema::create('kelengkapan_pemohon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asesi_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->text('nilai_mata_pelajaran_kompetensi');
            $table->text('sertifikat_prakerin');
            $table->text('nilai_raport');
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
        Schema::dropIfExists('kelengkapan_pemohon');
    }
};
