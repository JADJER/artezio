<?php

use Illuminate\Database\Seeder;

class FreqCollTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
}
