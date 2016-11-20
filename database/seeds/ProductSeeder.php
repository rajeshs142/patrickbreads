<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i<200; $i++) {
            $rand = 'P-'.str_random(10);
            DB::table('product')->insert([
                'name' => $rand,
                'product_slug' => $rand,
                'description' => str_random(100),
                'short_description' => str_random(25),
                'ingredients' => array_rand(['Eggs','Milk','Peanuts','Tree nuts','Fish','Shellfish','Wheat','Soy']),
                'category_id' => rand(1,10),
                'sub_category_id' => rand(11,60),
                'created_by' => 1,
                'image_url' => '/img/parallax1.jpg',
                'thumb_url' => '/img/parallax1.jpg',
                'code' => array_rand(['ABC', 'BBC', 'CBC', 'DBC']),
                'color' => array_rand(['red','green','brown','blue','pink','yellow','black','white','gray','violet','purple']),
                'texture' => array_rand(['creamy', 'crumbly','crunchy','greasy','gooey','cake','moist','mushy']),
                'size' => rand(1,12).' in x'.rand(1,12). ' in',
                'pack_size' => rand(1,12),
                'unit_weight' => rand(1,500).' gm',
                'case_weight' => rand(50,1000).' gm',
                'shelf_life' => rand(1,3).' months',
                'storage' => array_rand(['cool', 'dry', 'cool & dry', 'refrigerator', 'open']),
                'energy' => rand(1,100).' cal',
                'allergens' => array_rand(['Eggs','Milk','Peanuts','Tree nuts','Fish','Shellfish','Wheat','Soy']),
                'tags' => $rand,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
