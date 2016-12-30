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
