<?php

use Illuminate\Database\Seeder;

class MethodDeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('method_delivery')->insert([
            'id' => '1',
            'name' => 'По объявлению на взнос наличными',
        ]);
        DB::table('method_delivery')->insert([
            'id' => '2',
            'name' => 'В инкассаторских сумках',
        ]);
        DB::table('method_delivery')->insert([
            'id' => '3',
            'name' => 'Через службу инкассации',
        ]);
    }
}
