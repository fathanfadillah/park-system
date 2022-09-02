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
        Schema::dropIfExists('park_histories');
        Schema::create('park_histories', function (Blueprint $table) {
            $table->id('id');
            $table->string('park_id');
            $table->time('time', $precision = 0);
            $table->enum('status', ['ENTER', 'EXIT']);
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
        Schema::dropIfExists('park_histories');
    }
};
