<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::firstOrCreate([
            'name' => 'Software'
        ]);
        Category::firstOrCreate([
            'name' => 'Travel'
        ]);
        Category::firstOrCreate([
            'name' => 'Game'
        ]);
        Category::firstOrCreate([
            'name' => 'Food'
        ]);
        Category::firstOrCreate([
            'name' => 'Car'
        ]);
    }
}
