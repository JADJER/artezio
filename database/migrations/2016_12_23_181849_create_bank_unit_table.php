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
            $table->string('name');
            $table->timestamps();
        });
        DB::table('bank_unit')->insert([
            'id' => '1',
            'name' => 'Подразделение 1',
        ]);
        DB::table('bank_unit')->insert([
            'id' => '2',
            'name' => 'Подразделение 2',
        ]);
        DB::table('bank_unit')->insert([
            'id' => '3',
            'name' => 'Подразделение 3',
        ]);
        DB::table('bank_unit')->insert([
            'id' => '4',
            'name' => 'Подразделение 4',
        ]);
        DB::table('bank_unit')->insert([
            'id' => '5',
            'name' => 'Подразделение 5',
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
