<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'firstname' => 'Admin',
        	'lastname' => 'admin',
        	'email' => 'admin@admin.com',
        	'phone' => '+123456789',
        	'address1' => 'New York USA',
        	'address2' => 'New York USA',
        	'country' => 'USA',
        	'city' => 'New York',
        	'state' => 'New York',
        	'postalcode' => '12345',
        	'password' => bcrypt('password'),
        ]);

		for ($i=1; $i < 10; $i++) { 
	        User::create([
	        	'firstname' => 'User'.$i,
	        	'lastname' => 'userlastname',
	        	'email' => 'user@user'.$i.'.com',
	        	'phone' => '+123456789',
	        	'address1' => 'New York USA',
	        	'address2' => 'New York USA',
	        	'country' => 'USA',
	        	'city' => 'New York',
	        	'state' => 'New York',
	        	'postalcode' => '12345',
	        	'password' => bcrypt('password'),
	        ]);
		}
    }
}
