<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // category seeder
        for ($i=0; $i<10; $i++) {
            $rand = 'C-'.str_random(10);
            DB::table('category')->insert([
                'name' => $rand,
                'thumb_img' => '/img/parallax1.jpg',
                'hero_img' => '/img/blog1-tp.png',
                'url' => '/category/'.$rand,
                'category_slug' => $rand,
                'parent_id' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
        // subcategory seeder
        for ($i=0; $i<50; $i++) {
            $rand = 'SC-'.str_random(10);
            DB::table('category')->insert([
                'name' => $rand,
                'thumb_img' => '/img/parallax1.jpg',
                'hero_img' => '/img/blog1-tp.png',
                'url' => '/category/'.$rand,
                'category_slug' => $rand,
                'parent_id' => rand(1,10),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
