<?php

use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pictures', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('basedir', 255);
			$table->string('filename', 255);
			$table->integer('width')->unsigned();
			$table->integer('height')->unsigned();
			$table->integer('size')->unsigned();
			$table->string('mime_type', 255);
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
			$table->unique(array('basedir', 'filename'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('pictures');
	}

}