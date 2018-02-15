<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTopic extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('topic', function($table) {

            $table->foreign('organ_topic_id')->references('topic_id')->on('topic')->onDelete('set null');
            $table->foreign('parent_topic_id')->references('topic_id')->on('topic')->onDelete('set null');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('topic', function($table) {
			$table->dropForeign('topic_parent_topic_id_foreign');
			$table->dropForeign('topic_organ_topic_id_foreign');
		});
	}

}
