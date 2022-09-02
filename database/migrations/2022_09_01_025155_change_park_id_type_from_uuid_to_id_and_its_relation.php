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
        Schema::table('parks', function (Blueprint $table) {
            $table->dropColumn('id');
        });
        Schema::table('parks', function (Blueprint $table) {
            $table->id('id');
        });

        Schema::table('park_histories', function (Blueprint $table) {
            $table->integer('park_id')->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parks', function (Blueprint $table) {
            $table->dropColumn('id');
        });
        Schema::table('parks', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'));
        });

        Schema::table('park_histories', function (Blueprint $table) {
            $table->string('park_id')->change();
        });
    }
};
