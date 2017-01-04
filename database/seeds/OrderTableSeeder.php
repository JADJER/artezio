<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'id' => '1',
            'user_id' => '2',
            'order_status' => '1',
            'order_type' => '1',
            'unit' => '5',
            'unn' => '123',
            'kpp' => '123',
            'org_name' => '123',
            'contact_name' => '123',
            'contact_phone' => '123',
            'account_no' => '12312312312312312312',
            'bik' => '123123123',
            'bank_account_no' => '12312312312312312312',
            'bank_name' => '123',
            'swift' => '123',
            'bank_add_detail' => '123',
            'created_at' => '2016-12-30 21:45:02',
        ]);

        DB::table('orders')->insert([
            'id' => '2',
            'user_id' => '2',
            'order_status' => '1',
            'order_type' => '1',
            'unit' => '5',
            'unn' => '123',
            'kpp' => '123',
            'org_name' => '123',
            'contact_name' => '123',
            'contact_phone' => '123',
            'account_no' => '12312312312312312312',
            'bik' => '123123123',
            'bank_account_no' => '12312312312312312312',
            'bank_name' => '123',
            'swift' => '123',
            'bank_add_detail' => '123',
            'created_at' => '2016-12-30 21:45:02',
        ]);

        DB::table('orders')->insert([
            'id' => '3',
            'user_id' => '2',
            'order_status' => '1',
            'order_type' => '1',
            'unit' => '5',
            'unn' => '123',
            'kpp' => '123',
            'org_name' => '123',
            'contact_name' => '123',
            'contact_phone' => '123',
            'account_no' => '12312312312312312312',
            'bik' => '123123123',
            'bank_account_no' => '12312312312312312312',
            'bank_name' => '123',
            'swift' => '123',
            'bank_add_detail' => '123',
            'created_at' => '2016-12-30 21:45:02',
        ]);

        DB::table('orders')->insert([
            'id' => '4',
            'user_id' => '2',
            'isSigned' => '1',
            'order_status' => '3',
            'order_type' => '3',
            'unit' => '5',
            'unn' => '123',
            'kpp' => '123',
            'org_name' => '123',
            'contact_name' => '123',
            'contact_phone' => '123',
            'account_no' => '12312312312312312312',
            'bik' => '123123123',
            'bank_account_no' => '12312312312312312312',
            'bank_name' => '123',
            'swift' => '123',
            'bank_add_detail' => '123',
            'created_at' => '2016-12-30 21:45:02',
        ]);

        DB::table('orders')->insert([
            'id' => '5',
            'user_id' => '2',
            'isSigned' => '1',
            'order_status' => '3',
            'order_type' => '1',
            'unit' => '5',
            'unn' => '123',
            'kpp' => '123',
            'org_name' => '123',
            'contact_name' => '123',
            'contact_phone' => '123',
            'account_no' => '12312312312312312312',
            'bik' => '123123123',
            'bank_account_no' => '12312312312312312312',
            'bank_name' => '123',
            'swift' => '123',
            'bank_add_detail' => '123',
            'created_at' => '2016-12-30 21:45:02',
        ]);
    }
}
