<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnColumnPosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function(Blueprint $table)
		{
			$table->integer('category_id');
			$table->string('title_en');
			$table->string('subtitle_en');
			$table->string('code_en');
			$table->string('tag_en');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function(Blueprint $table)
		{
			$table->dropColumn('category_id');
			$table->dropColumn('title_en');
			$table->dropColumn('subtitle_en');
			$table->dropColumn('tag_en');
			$table->dropColumn('code_en');
		});
	}

}
