<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users')->insert(
                        array(	'name' => 'manager',
								'email' => 'manager@lms.com',
								'password' => bcrypt('manager'),
								'type' => 'manager',
								'remember_token' => null
                        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('users')->delete();
	}

}
