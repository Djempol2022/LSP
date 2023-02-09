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
            $table->foreignId('st_verifikasi_tuk_id')->nullable()->constrained('st_verifikasi_tuk')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('x03_st_verifikasi_tuk_id')->nullable()->constrained('x03_st_verifikasi_tuk')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('z_ba_pecah_rp_id')->nullable()->constrained('z_ba_pecah_rp')->onDelete('cascade')->onUpdate('cascade');
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
