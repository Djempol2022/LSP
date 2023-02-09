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
        Schema::create('bahasan_diskusi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('z_ba_pecah_rp_id')->nullable()->constrained('z_ba_pecah_rp')->onDelete('cascade')->onUpdate('cascade');
            $table->string('bahasan_diskusi');
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
        Schema::dropIfExists('bahasan_diskusi');
    }
};
