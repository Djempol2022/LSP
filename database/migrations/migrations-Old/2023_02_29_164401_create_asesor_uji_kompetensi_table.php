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
        Schema::create('asesor_uji_kompetensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_uji_kompetensi_id')->constrained('jadwal_uji_kompetensi')->onUpddate('cascade')->onDelete('cascade');
            $table->foreignId('user_asesor_id')->constrained('users')->onUpddate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('asesor_uji_kompetensi');
    }
};
