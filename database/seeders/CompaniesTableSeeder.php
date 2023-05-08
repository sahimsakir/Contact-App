<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

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
        $faker =  Faker::create();

        foreach(range(1,10) as $index){
            $companies[]=[
                'name' => $faker->name(),
                'address' => $faker->address(),
                'website' => $faker->domainName(),
                'email' => $faker->email(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('companies')->insert($companies);

    }
}
