<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('regions')->insert([
    		'Region_Name' => "Africa",
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "Asia",
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "Central America",
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "Eastern Europe",
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "European Union",
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "Middle East",
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "North America",
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "Oceania",
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "South America",
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "The Caribbean",
    	]);
    }
}
