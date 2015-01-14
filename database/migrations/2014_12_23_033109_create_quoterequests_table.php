<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateQuoterequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quoterequests', function($table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('email', 255);
			$table->string('company', 255);
			$table->string('country', 255);
			$table->string('phone', 50);
			$table->string('budget', 128);
			$table->text('project');
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
		Schema::drop('quoterequests');
	}

}
