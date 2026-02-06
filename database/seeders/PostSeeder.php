<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $data = [];

        foreach (range(1, 20) as $index) {
            $data[] = [
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
            ];
        }

        foreach ($data as $row) {
            Post::create($row);
        }
    }
}
