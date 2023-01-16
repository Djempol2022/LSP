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
        Schema::create('unit_kompetensi_isi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_kompetensi_sub_id')->constrained('unit_kompetensi_sub')->onUpdate('cascade')->onDelete('cascade');
            $table->text('judul_unit_kompetensi_isi')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('unit_kompetensi_isi');
    }
};
