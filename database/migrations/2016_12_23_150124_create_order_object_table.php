<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderObjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_object', function (Blueprint $table) {
            $table->integer('order_no');
            $table->primary('order_no')->references('order_no')->on('orders');
            $table->time('time_up');
            $table->string('method_delivery');
            $table->string('order_type')->references('id')->on('method_delivery');
            $table->string('frequency_collectors')->references('id')->on('frequency_collectors');
            $table->string('date_collectors');
            $table->integer('count_cash', false, true);
            $table->string('cash_code', 3);
            $table->string('head_object', 255);
            $table->date('start_date');
            $table->time('start_job_date');
            $table->time('stop_job_date');
            $table->time('start_saturday_date');
            $table->time('stop_saturday_date');
            $table->time('start_sunday_date');
            $table->time('stop_sunday_date');
            $table->string('address_type');
            $table->string('type_settlement', 2);
            $table->string('name_settlement', 100);
            $table->string('name_street', 100);
            $table->string('house_no', 20);
            $table->string('housing_no', 20);
            $table->string('service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_object');
    }
}
