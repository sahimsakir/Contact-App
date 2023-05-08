<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('companies')->truncate();

        $companies= [];

        foreach(range(1,10) as $index){
            $companies[]=[
                'name' => $name = "Company $index",
                'address' => $address = "Address $index",
                'website' => $website = "company$index.test",
                'email' => $email = "email@company$index.test",
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('companies')->insert($companies);

    }
}
