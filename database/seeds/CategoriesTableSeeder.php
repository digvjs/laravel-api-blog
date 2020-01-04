<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = array(
    		'Travel',
    		'Technical',
    		'Food',
    		'Entertainment',
    		'Artistic'
    	);

    	foreach ($data as $key => $value) {
    		Category::create([ 'name' => $value ]);
    	}
    }
}
