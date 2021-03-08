<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Generator as Faker;

// $factory->define(\App\Models\Produto::class, function (Faker $faker){
//     return[
//             'name' => $faker->setence(2),
//             'description' => $faker->paragraph(10)
//     ];
// });

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->name,
            // 'description' => $this->faker->unique()->safeEmail,

        ];
    }
}
