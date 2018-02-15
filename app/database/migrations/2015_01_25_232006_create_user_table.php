<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('user', function($table) {
                $table->increments('user_id');
                $table->string('email', 100)->unique();
                $table->string('password', 64);
                $table->string('first_name', 100)->nullable();
                $table->string('last_name', 100)->nullable();
                $table->timestamps();
                $table->rememberToken();
                $table->index('email');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
