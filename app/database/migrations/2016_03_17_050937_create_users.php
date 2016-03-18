<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username',50)->unique()->nullable();
			$table->string('first_name',50);
			$table->string('last_name',50);
			$table->string('email',255)->unique();
			$table->string('school',100);
			$table->string('gender',1);
			$table->string('password',75);
			$table->string('password_recovery_code',255);
			$table->integer('recovery_validity')->unsigned();
			$table->timestamp('last_login');
			$table->string('remember_token',100);
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
		Schema::drop('users');
	}

}
