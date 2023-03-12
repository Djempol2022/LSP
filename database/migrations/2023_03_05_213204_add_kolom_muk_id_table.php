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
        Schema::table('p_muk_pendekatan_asesmen', function (Blueprint $table) {
            $table->foreignId('jadwal_uji_kompetensi_id')->after('id')->constrained('jadwal_uji_kompetensi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('muk_id')->after('jadwal_uji_kompetensi_id')->constrained('muk')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_muk_pendekatan_asesmen', function (Blueprint $table) {
            //
        });
    }
};
