<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

// use Faker\Generator as Faker;

// $factory->define(\App\Models\Produto::class, function (Faker $faker){
//     return[
//             'name' => $faker->setence(2),
//             'description' => $faker->paragraph(10)
//     ];
// });

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->name,
            // 'category' => Category::factory(2)->state(new Sequence([['id' => '1'],
            // ['name'=>'Perecível']], 
            // [['id'=> '2'], 
            // ['name'=>'Não Perecível']])), 
            // 'description' =>$this->faker->paragraph
        ];
    }
}
