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
        Schema::table('asesi_uji_kompetensi', function (Blueprint $table) {
            $table->integer('status_ujian_berlangsung')->after('user_asesi_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asesi_uji_kompetensi', function (Blueprint $table) {
            //
        });
    }
};
