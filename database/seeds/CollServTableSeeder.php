<?php

use Illuminate\Database\Seeder;

class CollServTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
}
