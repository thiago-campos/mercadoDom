<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{


    static $categories = [
        'Perecível',
        'Não Perecível',

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$categories as $category){
            DB::table('categories')->insert([
            'name' => $category]);}
        // Category::factory(2)
        // ->create();
    }
}
