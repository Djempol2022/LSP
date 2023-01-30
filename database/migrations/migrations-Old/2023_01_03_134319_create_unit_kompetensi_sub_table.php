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
        Schema::create('unit_kompetensi_sub', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_kompetensi_id')->constrained('unit_kompetensi')->onUpdate('cascade')->onDelete('cascade');
            $table->text('judul_unit_kompetensi_sub');
            $table->text('bukti_relevan');
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
        Schema::dropIfExists('unit_kompetensi_sub');
    }
};
