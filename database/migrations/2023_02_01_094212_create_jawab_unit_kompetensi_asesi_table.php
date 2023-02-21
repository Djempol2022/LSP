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
        Schema::create('jawab_unit_kompetensi_asesi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_asesi_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('unit_kompetensi_isi_id')->constrained('unit_kompetensi_isi')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('status');
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
        Schema::dropIfExists('jawab_unit_kompetensi_asesi');
    }
};
