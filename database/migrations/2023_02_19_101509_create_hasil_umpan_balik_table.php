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
        Schema::create('hasil_umpan_balik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_uji_kompetensi_id')->constrained('jadwal_uji_kompetensi')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('user_asesi_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('umpan_balik_komponen_id')->constrained('umpan_balik_komponen')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->integer('hasil')->nullable();
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('hasil_umpan_balik');
    }
};
