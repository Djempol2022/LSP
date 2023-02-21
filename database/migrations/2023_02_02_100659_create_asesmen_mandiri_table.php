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
        Schema::create('asesmen_mandiri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_asesi_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->dateTime('tanggal_asesi')->nullable();
            $table->text('ttd_asesi')->nullable();
            $table->foreignId('user_asesor_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->dateTime('tanggal_asesor')->nullable();
            $table->text('ttd_asesor')->nullable();
            $table->integer('rekomendasi')->nullable();
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
        Schema::dropIfExists('asesmen_mandiri');
    }
};
