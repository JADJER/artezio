<?php

use Illuminate\Database\Seeder;

class OrderTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_type')->insert([
            'id' => '1',
            'name' => 'Инкассация',
        ]);
        DB::table('order_type')->insert([
            'id' => '2',
            'name' => 'Заявка на внесение изменений в действующий договор (добавление объекта)',
        ]);
        DB::table('order_type')->insert([
            'id' => '3',
            'name' => 'Заявка на внесение изменений в действующий договор (исключение объекта)',
        ]);
        DB::table('order_type')->insert([
            'id' => '4',
            'name' => 'Заявка на внесение изменений в действующий договор (изменение условий по объектам)',
        ]);
        DB::table('order_type')->insert([
            'id' => '5',
            'name' => 'Заявка на внесение изменений в действующий договор (изменение реквизитов договора)',
        ]);
    }
}
