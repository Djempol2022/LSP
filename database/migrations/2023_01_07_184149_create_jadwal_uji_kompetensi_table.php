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
        Schema::create('jadwal_uji_kompetensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('muk_id')->constrained('muk')->onDelete('cascade')->onUpdate('cascade');
            $table->string('sesi');
            $table->text('tanggal');
            $table->text('waktu_mulai');
            $table->text('waktu_selesai');
            $table->string('kelas');
            $table->string('tempat');
            $table->string('jenis_tes');
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
        Schema::dropIfExists('jadwal_uji_kompetensi');
    }
};
