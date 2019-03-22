<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
        	[
        		'first_name' => 'Joyner',
        		'last_name' => 'Lucas',
        		'company_id' => 1,
        		'email' => 'joyner123@gmail.com',
        		'phone' => '0123456789',
        	],
        	[
        		'first_name' => 'John',
        		'last_name' => 'Miller',
        		'company_id' => 2,
        		'email' => 'john123@gmail.com',
        		'phone' => '0153469789',
        	]
        ]);
    }
}
