<?php

use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function($table){
			$table->increments('id');
			$table->integer('picture_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('text', 255);
			$table->timestamps();
			$table->unique(array('picture_id', 'user_id', 'created_at'));
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
		Schema::dropIfExists('comments');
	}

}