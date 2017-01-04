<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectorServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collector_service', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->primary('id');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('collector_service')->insert([
            'id' => '1',
            'name' => 'Инкассация денежной наличности',
        ]);
        DB::table('collector_service')->insert([
            'id' => '2',
            'name' => 'Прием и зачисление/перечисление денежной наличности',
        ]);
        DB::table('collector_service')->insert([
            'id' => '3',
            'name' => 'Доставка денежной наличности',
        ]);
        DB::table('collector_service')->insert([
            'id' => '4',
            'name' => 'Доставка банкнот/монет в обмен на банкноты/монеты другого номинала;',
        ]);
        DB::table('collector_service')->insert([
            'id' => '5',
            'name' => 'Внесение изменений в действующий договор',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('collector_service');
    }
}
