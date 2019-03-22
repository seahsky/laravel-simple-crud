<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path_to_image = 'storage/images/company_logo/';

        DB::table('companies')->insert([
        	[
        		'name' => 'Perodua Sdn Bhd',
        		'logo' => $path_to_image.'perodua.jpg',
        		'website' => 'www.perodua.com',
        		'email' => 'perodua@gmail.com',
        	],
        	[
        		'name' => 'Proton Sdn Bhd',
        		'logo' => $path_to_image.'proton.png',
        		'website' => 'www.proton.com',
        		'email' => 'proton@gmail.com',
        	]
        ]);
    }
}
