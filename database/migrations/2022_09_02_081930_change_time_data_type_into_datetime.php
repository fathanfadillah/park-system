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
        Schema::table('park_histories', function (Blueprint $table) {
            $table->datetime('time')->change();        
        });
        Schema::table('parks', function (Blueprint $table) {
            $table->datetime('enter_time')->change();
            $table->datetime('exit_time')->change();        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('park_histories', function (Blueprint $table) {
            $table->time('time', $precision = 0)->change();        
        });
        Schema::table('parks', function (Blueprint $table) {
            $table->time('enter_time', $precision = 0)->change();        
            $table->time('exit_time', $precision = 0)->change();
        });
    }
};
