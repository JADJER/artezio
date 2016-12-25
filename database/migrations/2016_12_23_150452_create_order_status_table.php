<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->primary('id');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('order_status')->insert([
            'id' => '1',
            'name' => 'Создан / CREATED',
        ]);
        DB::table('order_status')->insert([
            'id' => '2',
            'name' => 'Ошибка контроля / CHECKERROR',
        ]);
        DB::table('order_status')->insert([
            'id' => '3',
            'name' => 'Подписан / SIGNED',
        ]);
        DB::table('order_status')->insert([
            'id' => '4',
            'name' => 'Удален / DELETED ',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_status');
    }
}
