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
            $table->increments('id');
            $table->integer('order_no');
            $table->time('time_up');
            $table->string('method_delivery');
            $table->string('frequency_collectors');
            $table->string('date_collectors');
            $table->integer('count_cash', false, true);
            $table->string('cash_code', 3);
            $table->string('head_object', 255);
            $table->date('start_date');
            $table->time('start_job_date')->nullable();
            $table->time('stop_job_date')->nullable();
            $table->time('start_saturday_date')->nullable();
            $table->time('stop_saturday_date')->nullable();
            $table->time('start_sunday_date')->nullable();
            $table->time('stop_sunday_date')->nullable();
            $table->string('address_type')->nullable();
            $table->string('type_settlement', 2)->nullable();
            $table->string('name_settlement', 100)->nullable();
            $table->string('name_street', 100)->nullable();
            $table->string('house_no', 20)->nullable();
            $table->string('housing_no', 20)->nullable();
            $table->string('services');
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
        Schema::drop('order_object');
    }
}
