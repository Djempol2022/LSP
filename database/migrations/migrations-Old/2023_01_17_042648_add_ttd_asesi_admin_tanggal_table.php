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
        Schema::table('sertifikasi', function (Blueprint $table) {
            $table->text('ttd_asesi')->after('tujuan_asesi')->nullable();
            // $table->foreignId('tanda_tangan_id')->
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sertifikasi', function (Blueprint $table) {
            //
        });
    }
};
