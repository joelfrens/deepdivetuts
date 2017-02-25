<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(App\Category::class, 20)->create()->each(function ($u) {
        		for ($i=0; $i<5; $i++)
        		{
		        	$u->videos()->save(factory(App\Video::class)->make());
		    	}
		    });
    }
}
