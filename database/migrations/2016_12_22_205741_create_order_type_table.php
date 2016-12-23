<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_type', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->primary('id');
            $table->string('order_type');
        });
        DB::table('order_type')->insert([
            'id' => '1',
            'order_type' => 'Инкассация',
        ]);
        DB::table('order_type')->insert([
            'id' => '2',
            'order_type' => 'Заявка на внесение изменений в действующий договор (добавление объекта)',
        ]);
        DB::table('order_type')->insert([
            'id' => '3',
            'order_type' => 'Заявка на внесение изменений в действующий договор (исключение объекта)',
        ]);
        DB::table('order_type')->insert([
            'id' => '4',
            'order_type' => 'Заявка на внесение изменений в действующий договор (изменение условий по объектам)',
        ]);
        DB::table('order_type')->insert([
            'id' => '5',
            'order_type' => 'Заявка на внесение изменений в действующий договор (изменение реквизитов договора)',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_type');
    }
}
