<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(SlidersTableSeeder::class);
    	$this->call(SidebarsTableSeeder::class);
    	$this->call(MapsTableSeeder::class);
    	$this->call(DetailTableSeeder::class);
    	$this->call(DetailSlideSrcsTableSeeder::class);
    }
  }
