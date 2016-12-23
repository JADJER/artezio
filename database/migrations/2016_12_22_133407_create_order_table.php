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
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('object_count');
            $table->boolean('isSigned')->default(0);;
            $table->boolean('isDeleted')->default(0);
            $table->index('user_id');
            $table->string('order_type');
            $table->string('order_no', 7)->unique();
            $table->timestamp('order_date');
            $table->string('unit')->references('id')->on('bank_unit');
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
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
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
