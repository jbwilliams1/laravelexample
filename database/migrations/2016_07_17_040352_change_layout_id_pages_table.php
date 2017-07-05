<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLayoutIdPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pages', function ($table) {
			//$table->renameColumn('layout_id', 'page_template_id');
			$table->integer('page_template_id')->unsigned()->nullable();

			$table->foreign('page_template_id')->references('id')->on('page_templates');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pages', function ($table) {
			$table->dropForeign(['page_template_id']);
			$table->renameColumn('page_template_id','layout_id');
		});
	}

}
