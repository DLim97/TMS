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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s');
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s');
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "Asia",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s');
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s');
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "Central America",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s');
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s');
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "Eastern Europe",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s');
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s');
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "European Union",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s');
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s');
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "Middle East",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s');
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s');
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "North America",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s');
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s');
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "Oceania",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s');
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s');
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "South America",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s');
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s');
    	]);

    	DB::table('regions')->insert([
    		'Region_Name' => "The Caribbean",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s');
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s');
    	]);
    }
}
