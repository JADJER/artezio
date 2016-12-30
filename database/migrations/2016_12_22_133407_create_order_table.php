<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('object_count')->default(0);
            $table->boolean('isSigned')->default(0);
            $table->boolean('isDeleted')->default(0);
            $table->integer('order_status')->unsigned();
            $table->foreign('order_status')->references('id')->on('order_status');
            $table->integer('order_type')->unsigned();
            $table->foreign('order_type')->references('id')->on('order_type');
            $table->integer('unit')->unsigned();
            $table->foreign('unit')->references('id')->on('bank_unit');
            $table->string('unn', 12)->nullable();
            $table->string('kpp', 9)->nullable();
            $table->string('org_name', 255)->nullable();
            $table->string('ogrn', 13)->nullable();
            $table->string('contact_name', 255);
            $table->string('contact_phone', 255);
            $table->string('account_no', 20);
            $table->string('bik', 9);
            $table->string('bank_account_no', 20);
            $table->string('bank_name', 255);
            $table->string('swift', 11)->nullable();
            $table->string('bank_add_detail', 255)->nullable();
            $table->timestamps();
        });

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


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
