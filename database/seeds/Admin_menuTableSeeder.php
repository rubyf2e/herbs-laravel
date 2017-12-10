<?php
Use App\Admin_menu;
use Illuminate\Database\Seeder;

class Admin_menuTableSeeder extends Seeder
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
     			"parent_id" => 0,
     			"order"     => 1,
     			"title"     => "圖片輪播區",
     			"icon"      => "fa-picture-o",
     			"uri"       => "sliders",
     		),

     		array(
     			"parent_id" => 0,
     			"order"     => 2,
     			"title"     => "香草介紹",
     			"icon"      => "fa-book",
     			"uri"       => "details",
     		),

     		array(
     			"parent_id" => 0,
     			"order"     => 3,
     			"title"     => "香草地圖",
     			"icon"      => "fa-map-marker",
     			"uri"       => "maps",
     		),

     		array(
     			"parent_id" => 0,
     			"order"     => 4,
     			"title"     => "快速連結",
     			"icon"      => "fa-anchor",
     			"uri"       => "sidebars",
     		),

     	);

     	for ($i=0; $i < count($target) ; $i++) { 
     		Admin_menu::create([
     			'parent_id' => $target[$i]['parent_id'],
     			'order'     => $target[$i]['order'],
     			'title'     => $target[$i]['title'],
     			'icon'      => $target[$i]['icon'],
     			'uri'       => $target[$i]['uri'],
     		]);
     	}

     }
   }
