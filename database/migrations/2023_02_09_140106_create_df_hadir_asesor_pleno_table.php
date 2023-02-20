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
        Schema::create('df_hadir_asesor_pleno', function (Blueprint $table) {
            $table->id();
            $table->date('thn_ajaran')->nullable();
            $table->date('tgl')->nullable();
            $table->time('wkt_mulai')->nullable();
            $table->time('wkt_selesai')->nullable();
            $table->string('tempat')->nullable();
            $table->string('jabatan_bttd')->nullable();
            $table->string('nama_bttd')->nullable();
            $table->string('no_met_bttd')->nullable();
            $table->text('ttd')->nullable();
            $table->boolean('is_pleno')->nullable();
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
        Schema::dropIfExists('df_hadir_asesor_pleno');
    }
};
