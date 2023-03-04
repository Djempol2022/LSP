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
        Schema::create('p_muk_orang_relevan_ttd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skema_sertifikasi_id')->constrained('skema_sertifikasi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('orang_relevan_id')->constrained('p_muk_orang_relevan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('ttd')->nullable();
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
        Schema::dropIfExists('p_muk_orang_relevan_ttd');
    }
};
