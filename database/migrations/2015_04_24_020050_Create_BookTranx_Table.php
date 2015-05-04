<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTranxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_tranx', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('book_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->date('borrow_dt');
			$table->date('due_dt');
			$table->date('return_dt');
			$table->timestamps();
			
			$table->foreign('book_id')
				  ->references('book_id')
				  ->on('books')
				  ->onDelete('cascade');
				  
			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_tranx');
	}

}
