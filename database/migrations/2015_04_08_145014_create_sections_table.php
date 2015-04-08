<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('shortName',20)->nullable();
			$table->tinyInteger('author');
			$table->string('description')->nullable();
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
		Schema::drop('sections');
	}

}
