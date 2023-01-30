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
        Schema::create('df_tuk_terverifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('tempat_ditetapkan');
            $table->date('tanggal_ditetapkan');
            $table->string('nama_bttd');
            $table->string('jabatan_bttd');
            $table->text('ttd');
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
        Schema::dropIfExists('df_tuk_terverifikasi');
    }
};
