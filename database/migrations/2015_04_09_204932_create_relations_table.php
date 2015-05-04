<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('author');
			$table->string('postId')->nullable();
			$table->string('userId')->nullable();
			$table->string('section')->nullable();
			$table->string('backupA')->nullable();
			$table->string('backupB')->nullable();
			$table->string('backupC')->nullable();
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
		Schema::drop('relations');
	}

}
