<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean("isAdmin")->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@site.com',
            'password' => '$2y$10$NWhYPcSLWGrOHukYPSTNN.27Qm91Q0CNou4yfZS7PkcCXUXmR7.du',   //RootPassword1
            'isAdmin' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@site.com',
            'password' => '$2y$10$RJ/dM3vNQeJWrCqmPNu2DeNOSP.ntmWQAA0ox7lH5UIvieZQbHBW2',   //password1
            'isAdmin' => '0',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
