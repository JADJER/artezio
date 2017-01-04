<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_code', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->primary('id');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('cash_code')->insert([
            'id' => '840',
            'name' => 'USD',
        ]);
        DB::table('cash_code')->insert([
            'id' => '974',
            'name' => 'BYR',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cach_code');
    }
}
