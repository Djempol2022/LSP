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
        Schema::create('p_muk_orang_relevan_lainnya_ttd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_uji_kompetensi_id')->constrained('jadwal_uji_kompetensi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('muk_id')->constrained('muk')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('orang_relevan_id')->constrained('p_muk_orang_relevan')->cascadeOnDelete()->cascadeOnUpdate();            
            $table->text('orang_relevan_lainnya')->nullable();
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
        Schema::dropIfExists('p_muk_orang_relevan_lainnya_ttd');
    }
};
