<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('author');
			$table->string('imgUrl',50);
			$table->string('tag');
			$table->integer('albumId');
			$table->string('backupA');
			$table->string('backupB');
			$table->string('backupC');
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
		Schema::drop('collects');
	}

}
