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
        Schema::create('sarana_prasarana_sub', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sarana_prasarana_id')->constrained('sarana_prasarana')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('sarana_prasarana_sub')->nullable();
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
        Schema::dropIfExists('sarana_prasarana_sub');
    }
};
