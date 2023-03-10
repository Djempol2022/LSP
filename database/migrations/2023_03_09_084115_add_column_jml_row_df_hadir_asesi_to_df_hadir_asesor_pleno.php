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
        Schema::table('df_hadir_asesor_pleno', function (Blueprint $table) {
            $table->integer('jml_row_df_hadir_asesi')->after('is_pleno')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('df_hadir_asesor_pleno', function (Blueprint $table) {
            //
        });
    }
};
