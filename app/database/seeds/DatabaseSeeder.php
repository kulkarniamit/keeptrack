<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		if( App::environment() === 'local'){
			// Records will not be inserted in remote DB
			$this->call('JobsTableSeeder');
			$this->command->info('Jobs table seeded.');
		}
		// $this->call('UserTableSeeder');
	}

}
