<?php

namespace Database\Seeders;

use App\Models\{Category,Product};
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10; $i++){
             Product::insert([
                $i => [
                    'name' => 'produto'.$i+1,
                    'description' => 'Este é o produto '.$i+1,
                    'category' => rand(1,2),//id da tab categories
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }
       
    }
}
