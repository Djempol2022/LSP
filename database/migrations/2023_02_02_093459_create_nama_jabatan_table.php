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
        Schema::create('nama_jabatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('st_verifikasi_tuk_id')->constrained('st_verifikasi_tuk')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('nama');
            $table->string('jabatan');
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
        Schema::dropIfExists('nama_jabatan');
    }
};
