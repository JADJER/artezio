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
             $table->string('freq_collectors');
         });
        DB::table('frequency_collectors')->insert([
            'id' => '1',
            'freq_collectors' => 'Ежедневно',
        ]);
        DB::table('frequency_collectors')->insert([
            'id' => '2',
            'freq_collectors' => 'Рабочие дни',
        ]);
        DB::table('frequency_collectors')->insert([
            'id' => '3',
            'freq_collectors' => 'Через день',
        ]);
        DB::table('frequency_collectors')->insert([
            'id' => '4',
            'freq_collectors' => 'День недели',
        ]);
        DB::table('frequency_collectors')->insert([
            'id' => '5',
            'freq_collectors' => 'По заявке',
        ]);
        DB::table('frequency_collectors')->insert([
            'id' => '6',
            'freq_collectors' => 'По звонку',
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
