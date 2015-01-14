<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('generalbriefs', function($table) {
			$table->increments('id');
			$table->string('contact_person', 128);
			$table->string('email', 255);
			$table->string('company', 128);
			$table->string('industry', 128);
			$table->string('since', 128);
			$table->string('current_website', 255);
			$table->text('background');
			$table->text('reaction');
			$table->text('nutshell');
			$table->timestamps();
		});

		Schema::create('logobriefs', function($table) {
			$table->increments('id');
			$table->integer('generalbrief_id')->unsigned();
			$table->tinyInteger('haslogo');
			$table->text('logocolours');
			$table->text('logodirection');
			$table->text('logorestrictions');
			$table->text('logorequirements');
			$table->timestamps();
		});

		Schema::create('logouploads', function($table) {
			$table->increments('id');
			$table->integer('logobrief_id')->unsigned();
			$table->text('imagepath');
			$table->timestamps();
		});

		Schema::create('sitebriefs', function($table) {
			$table->increments('id');
			$table->integer('generalbrief_id')->unsigned();
			$table->tinyInteger('hasdomain');
			$table->string('domain_name', 255);
			$table->tinyInteger('hosting');
			$table->text('hosting_details');
			$table->string('sitetype', 128);
			$table->text('sitetype_details');
			$table->string('content_management', 128);
			$table->text('cm_details');
			$table->text('socialmedia');
			$table->text('site_requirements');
			$table->text('site_direction');
			$table->text('sitetarget');
			$table->timestamps();
		});

		Schema::create('printbriefs', function($table) {
			$table->increments('id');
			$table->integer('generalbrief_id')->unsigned();
			$table->text('printdesc');
			$table->text('printuse');
			$table->text('printspecifics');
			$table->text('printdirection');
			$table->text('printtext');
			$table->text('printrestrictions');
			$table->text('printcolour');
			$table->tinyInteger('printprint');
			$table->text('printrequirements');
			$table->timestamps();
		});

		Schema::create('printimageuploads', function($table) {
			$table->increments('id');
			$table->integer('printbrief_id')->unsigned();
			$table->text('imagepath');
			$table->timestamps();
		});

		Schema::create('printdocuploads', function($table) {
			$table->increments('id');
			$table->integer('printbrief_id')->unsigned();
			$table->text('documentpath');
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
		Schema::drop('printdocuploads');
		Schema::drop('printimageuploads');
		Schema::drop('printbriefs');
		Schema::drop('sitebriefs');
		Schema::drop('logouploads');
		Schema::drop('logobriefs');
		Schema::drop('generalbriefs');
	}

}
