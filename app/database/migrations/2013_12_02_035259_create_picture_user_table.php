<?php

use Illuminate\Database\Migrations\Migration;

class CreatePictureUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('picture_user', function($table){
			$table->integer('picture_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			$table->primary(array('picture_id', 'user_id'));
			$table->foreign('picture_id')->references('id')->on('pictures');
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
		Schema::dropIfExists('picture_user');
	}

}