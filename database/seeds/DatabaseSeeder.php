<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BankUnitTableSeeder::class);
        $this->call(CashCodeTableSeeder::class);
        $this->call(CollServTableSeeder::class);
        $this->call(FreqCollTableSeeder::class);
        $this->call(MethodDeliveryTableSeeder::class);
        //$this->call(OrderObjectsTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderTypeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
