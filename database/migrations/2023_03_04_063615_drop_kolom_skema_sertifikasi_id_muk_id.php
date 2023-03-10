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
        Schema::table('p_muk_validator', function (Blueprint $table) {
            $table->dropConstrainedForeignId('skema_sertifikasi_id');
            $table->dropConstrainedForeignId('muk_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_muk_validator', function (Blueprint $table) {
            //
        });
    }
};
