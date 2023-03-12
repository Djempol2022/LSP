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
        Schema::create('p_muk_validator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skema_sertifikasi_id')->constrained('skema_sertifikasi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_peninjau_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('jabatan')->nullable();
            $table->text('ttd_peninjau')->nullable();
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
        Schema::dropIfExists('p_muk_validator');
    }
};
