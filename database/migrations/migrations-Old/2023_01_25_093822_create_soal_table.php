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
        Schema::create('soal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_uji_kompetensi_id')->constrained('jadwal_uji_kompetensi')->onDelete('cascade')->onUpdate('cascade');
            $table->text('pertanyaan')->nullable();
            $table->string('pilihan')->nullable();
            $table->integer('jawaban')->nullable();
            $table->integer('acc');
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
        Schema::dropIfExists('soal');
    }
};
