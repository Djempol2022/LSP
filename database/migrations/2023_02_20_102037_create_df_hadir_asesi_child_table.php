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
        Schema::create('df_hadir_asesi_child', function (Blueprint $table) {
            $table->id();
            $table->foreignId('df_hadir_asesi_id')->nullable()->constrained('df_hadir_asesi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('institusi_id')->nullable()->constrained('institusi')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_peserta');
            $table->string('nama_asesi');
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
        Schema::dropIfExists('df_hadir_asesi_child');
    }
};
