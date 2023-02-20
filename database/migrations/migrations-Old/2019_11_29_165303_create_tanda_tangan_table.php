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
        Schema::create('tanda_tangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sertifikasi_id')->constrained('sertifikasi')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_admin')->nullable();
            $table->string('no_reg')->nullable();
            $table->text('ttd_admin')->nullable();
            $table->date('tanggal')->nullable();
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('tanda_tangan');
    }
};
