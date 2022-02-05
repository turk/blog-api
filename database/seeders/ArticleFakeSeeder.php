<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run(): void
    {
        $data = [];
        $faker = Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'name' => $faker->sentence(),
                'price' => random_int(0.01, 9999.99) / 10,
            ];
        }

        Article::insert($data);
    }
}
