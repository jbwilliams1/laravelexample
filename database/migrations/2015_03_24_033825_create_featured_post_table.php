<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('featured_posts', function($table)
        {
            $table->increments('featured_post_id');

            $table->string('featured_post_name', 400);
            $table->text('featured_post_description');
            $table->longText('featured_post_content');
            $table->text('featured_post_image_source');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('featured_posts');
	}

}
