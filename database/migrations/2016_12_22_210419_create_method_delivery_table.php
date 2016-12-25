<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('method_delivery', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->primary('id');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('method_delivery')->insert([
            'id' => '1',
            'name' => 'По объявлению на взнос наличными',
        ]);
        DB::table('method_delivery')->insert([
            'id' => '2',
            'name' => 'В инкассаторских сумках',
        ]);
        DB::table('method_delivery')->insert([
            'id' => '3',
            'name' => 'Через службу инкассации',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('method_delivery');
    }
}
