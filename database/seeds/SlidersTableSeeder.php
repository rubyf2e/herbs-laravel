<?php
Use App\Sliders;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
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
    			"id" => 1,
    			"src" =>  "images/slide/1.jpg"
    		),
    		array(
    			"id" => 2,
    			"src" =>  "images/slide/2.jpg"
    		),
    		array(
    			"id" => 3,
    			"src" =>  "images/slide/3.jpg"
    		)
    	);

    	for ($i=0; $i < count($target) ; $i++) { 
    		Sliders::create([
    			'src' => $target[$i]['src'],
    		]);
    	}



    }
  }
