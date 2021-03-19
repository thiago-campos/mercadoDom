<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //      'name' => Category::factory(2)
            //     ->state(new Sequence(
            //     ['name' => 'Perecível'],
            //     ['name' => 'Não Perecível'],
            // )), 
        ];
    }
}
