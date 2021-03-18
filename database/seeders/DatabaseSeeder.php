<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Category, User};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
         ]);
         
    }
}
