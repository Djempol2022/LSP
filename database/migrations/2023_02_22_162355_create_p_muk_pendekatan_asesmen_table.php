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
        Schema::create('p_muk_pendekatan_asesmen_1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skema_sertifikasi_id')->constrained('skema_sertfikasi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pendekatan1')->nullable();
            $table->integer('pilihan')->nullable();
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
        Schema::dropIfExists('p_muk_pendekatan_asesmen');
    }
};
