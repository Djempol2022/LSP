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
        Schema::table('jadwal_uji_kompetensi', function (Blueprint $table) {
            $table->dropColumn('sesi');
            $table->dropColumn('tanggal');
            $table->dropColumn('waktu_mulai');
            $table->dropColumn('waktu_selesai');
            $table->dropColumn('total_waktu');
            $table->dropColumn('kelas');
            $table->dropColumn('tempat');
            $table->dropColumn('jenis_tes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_uji_kompetensi', function (Blueprint $table) {
            //
        });
    }
};
