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
        Schema::create('sarana_prasarana_sub_2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sarana_prasarana_sub_id')->constrained('sarana_prasarana_sub')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('sarana_prasarana_sub_2')->nullable();
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
        Schema::dropIfExists('sarana_prasarana_sub_2');
    }
};
