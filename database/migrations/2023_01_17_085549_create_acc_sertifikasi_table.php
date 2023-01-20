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
        Schema::create('acc_sertifikasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('sertifikasi_id')->unsigned();
            $table->date('tanggal');
            $table->string('status')->nullable();
            $table->string('ttd_asesor');
            $table->string('ttd_asesi');
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
        Schema::dropIfExists('acc_sertifikasi');
    }
};
