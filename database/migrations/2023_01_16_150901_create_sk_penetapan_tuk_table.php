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
        Schema::create('sk_penetapan_tuk', function (Blueprint $table) {
            $table->id();
            $table->string('no_sk');
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
        Schema::dropIfExists('sk_penetapan_tuk');
    }
};
