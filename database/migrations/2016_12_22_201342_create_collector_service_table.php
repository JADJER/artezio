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
            $table->string('serv');
        });
        DB::table('collector_service')->insert([
            'id' => '1',
            'serv' => 'Инкассация денежной наличности',
        ]);
        DB::table('collector_service')->insert([
            'id' => '2',
            'serv' => 'Прием и зачисление/перечисление денежной наличности',
        ]);
        DB::table('collector_service')->insert([
            'id' => '3',
            'serv' => 'Доставка денежной наличности',
        ]);
        DB::table('collector_service')->insert([
            'id' => '4',
            'serv' => 'Доставка банкнот/монет в обмен на банкноты/монеты другого номинала;',
        ]);
        DB::table('collector_service')->insert([
            'id' => '5',
            'serv' => 'Внесение изменений в действующий договор',
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
