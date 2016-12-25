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
            $table->string('name');
            $table->timestamps();
        });
        DB::table('order_type')->insert([
            'id' => '1',
            'name' => 'Инкассация',
        ]);
        DB::table('order_type')->insert([
            'id' => '2',
            'name' => 'Заявка на внесение изменений в действующий договор (добавление объекта)',
        ]);
        DB::table('order_type')->insert([
            'id' => '3',
            'name' => 'Заявка на внесение изменений в действующий договор (исключение объекта)',
        ]);
        DB::table('order_type')->insert([
            'id' => '4',
            'name' => 'Заявка на внесение изменений в действующий договор (изменение условий по объектам)',
        ]);
        DB::table('order_type')->insert([
            'id' => '5',
            'name' => 'Заявка на внесение изменений в действующий договор (изменение реквизитов договора)',
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
