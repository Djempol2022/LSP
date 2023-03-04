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
        Schema::create('p_muk_rencana_asesmen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('elemen_isi_2_id')->constrained('unit_kompetensi_isi_2')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('jenis_bukti')->nullable();
            $table->string('metode');
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
        Schema::dropIfExists('p_muk_rencana_asesmen');
    }
};
