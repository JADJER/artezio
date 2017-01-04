<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrequencyCollectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('frequency_collectors', function (Blueprint $table) {
             $table->integer('id')->unique();
             $table->primary('id');
             $table->string('name');
             $table->timestamps();
         });
        DB::table('frequency_collectors')->insert([
            'id' => '1',
            'name' => 'Ежедневно',
        ]);
        DB::table('frequency_collectors')->insert([
            'id' => '2',
            'name' => 'Рабочие дни',
        ]);
        DB::table('frequency_collectors')->insert([
            'id' => '3',
            'name' => 'Через день',
        ]);
        DB::table('frequency_collectors')->insert([
            'id' => '4',
            'name' => 'День недели',
        ]);
        DB::table('frequency_collectors')->insert([
            'id' => '5',
            'name' => 'По заявке',
        ]);
        DB::table('frequency_collectors')->insert([
            'id' => '6',
            'name' => 'По звонку',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('frequency_collectors');
    }
}
