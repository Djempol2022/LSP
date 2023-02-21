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
        Schema::create('sk_penetapan_tuk_child', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sk_penetapan_tuk_id')->constrained('sk_penetapan_tuk')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('nama_tuk_id')->constrained('nama_tuk')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('skema_sertifikasi_id')->constrained('skema_sertifikasi')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tempat');
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
        Schema::dropIfExists('sk_penetapan_tuk_child');
    }
};
