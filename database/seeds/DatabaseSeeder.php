<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$admin = new User();
		$admin->name = 'Admin Zafirah';
		$admin->email = 'zafirahadmin@gmail.com';
		$admin->password = bcrypt('zafirah32');
		$admin->remember_token = \Str::random(50);
		$admin->save();
    }
}
