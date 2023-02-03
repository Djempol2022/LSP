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
        Schema::create('sarana_prasarana', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hasil_verifikasi_tuk_id')->constrained('hasil_verifikasi_tuk')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('sarana_prasarana')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('kondisi')->nullable();
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
        Schema::dropIfExists('sarana_prasarana');
    }
};
