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
        Schema::create('jawaban_asesi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_asesi_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('soal_id')->constrained('soal')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jawaban');
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
        Schema::dropIfExists('jawaban_asesi');
    }
};
