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
        Schema::table('unit_kompetensi', function (Blueprint $table) {
            $table->foreignId('skema_sertifikasi_id')->after('id')->constrained('skema_sertifikasi')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unit_kompetensi', function (Blueprint $table) {
            //
        });
    }
};
