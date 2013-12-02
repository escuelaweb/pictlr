<?php

use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('followers', function($table){
			$table->integer('follower_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			$table->foreign('follower_id')->references('id')->on('users');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('followers');
	}

}