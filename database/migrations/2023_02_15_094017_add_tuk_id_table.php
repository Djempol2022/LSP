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
        Schema::table('pelaksanaan_ujian', function (Blueprint $table) {
            $table->foreignId('tuk_id')->after('kelas')->constrained('nama_tuk')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelaksanaan_ujian', function (Blueprint $table) {
            //
        });
    }
};
