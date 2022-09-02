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
        Schema::dropIfExists('parks');
        Schema::create('parks', function (Blueprint $table) {
            $table->uuid('park_id')->default(DB::raw('(UUID())'));
            $table->string('policy_number');
            $table->time('enter_time', $precision = 0);
            $table->time('exit_time', $precision = 0)->nullable();
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('parks');
    }
};
