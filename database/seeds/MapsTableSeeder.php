<?php
Use App\Maps;
use Illuminate\Database\Seeder;

class MapsTableSeeder extends Seeder
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
    			'id' => 0,
    			'name' => '法國',
    			'memo' => '普羅旺斯有著很漂亮的薰衣草花海',
    			'position' =>  array(
    				'lat' =>  47.0720587,
    				'lng' =>  2.00
    			)
    		),
    		array(
    			'id' => 1,
    			'name' => '英國',
    			'memo' => '英國盛產玫瑰，可作玫瑰花茶',
    			'position' =>  array(
    				'lat' => 55.3178563,
    				'lng' => -2.8872784
    			)
    		),
    		array(
    			'id' => 2,
    			'name' => '義大利',
    			'memo' => '地中海沿岸素來有「香草的故鄉」之稱',
    			'position' =>  array(
    				'lat' =>  43.4035736,
    				'lng' =>  12.29
    			)
    		),
    		array(
    			'id' => 3,
    			'name' => '西班牙',
    			'memo' => '西班牙也有西班牙薰衣草',
    			'position' =>  array(
    				'lat' =>  39.9631876,
    				'lng' =>  -3.7843839
    			)
    		),
    		array(
    			'id' => 4,
    			'name' => '建國花市',
    			'memo' => '在台灣到建國花市就可以買到很多香草',
    			'position' =>  array(
    				'lat' =>  25.0336167,
    				'lng' =>  121.5356188
    			)
    		),
    		array(
    			'id' => 5,
    			'name' => '我家',
    			'memo' => '這是秘密',
    			'position' =>  array(
    				'lat' =>  30.3486579,
    				'lng' =>  -137.1655373
    			)
    		)
    	);

    	for ($i=0; $i < count($target) ; $i++) { 
    		Maps::create([
    			'name' => $target[$i]['name'],
    			'memo' => $target[$i]['memo'],
    			'position' => json_encode($target[$i]['position']),
    		]);
    	}
    }
}
