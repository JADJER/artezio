<?php

use Illuminate\Database\Seeder;

class CashCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cash_code')->insert([
            'id' => '840',
            'name' => 'USD',
        ]);
        DB::table('cash_code')->insert([
            'id' => '974',
            'name' => 'BYR',
        ]);
    }
}
