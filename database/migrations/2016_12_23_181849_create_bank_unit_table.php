<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_unit', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->primary('id');
            $table->string('unit');
        });
        DB::table('bank_unit')->insert([
            'id' => '1',
            'unit' => 'Подразделение 1',
        ]);
        DB::table('bank_unit')->insert([
            'id' => '2',
            'unit' => 'Подразделение 2',
        ]);
        DB::table('bank_unit')->insert([
            'id' => '3',
            'unit' => 'Подразделение 3',
        ]);
        DB::table('bank_unit')->insert([
            'id' => '4',
            'unit' => 'Подразделение 4',
        ]);
        DB::table('bank_unit')->insert([
            'id' => '5',
            'unit' => 'Подразделение 5',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bank_unit');
    }
}
