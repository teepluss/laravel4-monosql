<?php

use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration {

	protected $table;

	public function __construct()
	{
		$this->table = \Config::get('monosql::config.table');
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->table, function($table)
		{
			$table->engine = 'InnoDB';

		    $table->bigIncrements('id');
		    $table->string('channel', 50)->index();
		    $table->text('message');
		    $table->string('level', 50)->index();
		    $table->string('level_name', 100);
		    $table->text('context');
		    $table->text('formatted');
		    $table->dateTime('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->table);
	}

}