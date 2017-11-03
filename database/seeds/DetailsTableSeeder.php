<?php

Use App\Details;
use Illuminate\Database\Seeder;

class DetailTableSeeder extends Seeder
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
    			"id" => 0,
    			"src" =>  "images/plant/1.jpg",
    			"title" => "雙瓣茉莉",
    			"memo" => "雙瓣茉莉的學名 sambac 從梵語champaka而來，原指木蘭科含笑屬的黃玉蘭（Michelia champaca）。中文中廣義的茉莉花一詞，常指木樨科素馨屬（Jasminum）常綠灌木或藤本植物的統稱。但人們平常俗稱的茉莉花即指雙瓣茉莉。"
    		),
    		array(
    			"id" => 1,
    			"src" =>  "images/plant/2.jpg",
    			"title" => "狹葉薰衣草",
    			"memo" => "狹葉薰衣草（又叫真薰衣草或英國薰衣草）原産於地中海的西部，它的出油率較高，出油品質最高。提鍊後得到的精油可以直接在皮膚上使用。主要種植地是歐洲的英國，保加利亞的高山地區，大洋洲的澳大利亞和中國大陸的甘肅清水地區少量種植。"
    		),
    		array(
    			"id" => 2,
    			"src" =>  "images/plant/3.jpg",
    			"title" => "羅馬洋甘菊",
    			"memo" => "果香菊（學名：Chamaemelum nobile），也稱為羅馬洋甘菊，為菊科果香菊屬下的一個種。其產地主要為法國，有著類似青蘋果的甜酸味香氣，在精神不佳時可成為轉換情緒的配方。"
    		)
    	);

    	for ($i=0; $i < count($target) ; $i++) { 
    		Details::create([
					'title' => $target[$i]['title'],
					'memo'  => $target[$i]['memo'],
					'src'   => $target[$i]['src'],
    		]);
    	}



    }
  }
