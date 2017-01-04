<?php

use Illuminate\Database\Seeder;

class BankUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
}
