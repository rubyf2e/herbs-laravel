<?php
Use App\DetailSlideSrcs;
use Illuminate\Database\Seeder;

class DetailSlideSrcsTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

    $target      = array(

        array(
            "id"         => 0,
            "details_id" => 1,
            "src"        =>  "images/plant/1-1.jpg"
        ),
        array(
            "id"         => 1,
            "details_id" => 1,
            "src"        =>  "images/plant/1-2.jpg"
        ),
        array(
            "id"         => 2,
            "details_id" => 1,
            "src"        =>  "images/plant/1-3.jpg"
        ),
        array(
            "id"         => 3,
            "details_id" => 2,
            "src"        =>  "images/plant/2-1.jpg"
        ),
        array(
            "id"         => 4,
            "details_id" => 2,
            "src"        =>  "images/plant/2-2.jpg"
        ),
        array(
            "id"         => 5,
            "details_id" => 2,
            "src"        =>  "images/plant/2-3.jpg"
        ),
        array(
            "id"         => 6,
            "details_id" => 3,
            "src"        =>  "images/plant/3-1.jpg"
        ),
        array(
            "id"         => 7,
            "details_id" => 3,
            "src"        =>  "images/plant/3-2.jpg"
        ),
        array(
            "id"         => 8,
            "details_id" => 3,
            "src"        =>  "images/plant/3-3.jpg"
        )
    );

    for ($i      =0; $i < count($target) ; $i++) { 
        DetailSlideSrcs::create([
            'details_id' => $target[$i]['details_id'],
            'src'        => $target[$i]['src']
        ]);
    }

}
}
