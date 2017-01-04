<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            'id' => '1',
            'name' => 'Создан / CREATED',
        ]);
        DB::table('order_status')->insert([
            'id' => '2',
            'name' => 'Ошибка контроля / CHECKERROR',
        ]);
        DB::table('order_status')->insert([
            'id' => '3',
            'name' => 'Подписан / SIGNED',
        ]);
        DB::table('order_status')->insert([
            'id' => '4',
            'name' => 'Удален / DELETED ',
        ]);
    }
}
