<?php
Use App\Sidebars;
use Illuminate\Database\Seeder;

class SidebarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	$target = array(
    		array(
    			"name" => "回頂部",
    			"url" => "slider",
    			"distance" => 0,
    			"src" => "images/svg/rocket.svg"
    		),
    		array(
    			"name" => "香草介紹",
    			"url" => "detail",
    			"distance" => 0,
    			"src" => "images/svg/book2.svg"
    		),
    		array(
    			"name" => "香草產地",
    			"url" => "site",
    			"distance" => 0,
    			"src" => "images/svg/001-placeholder-2.svg"
    		)
    	);

    	for ($i=0; $i < count($target) ; $i++) { 
    		Sidebars::create([
					'name'     => $target[$i]['name'],
					'url'      => $target[$i]['url'],
					'distance' => $target[$i]['distance'],
					'src'      => $target[$i]['src'],
    		]);
    	}

    	
    }
  }
