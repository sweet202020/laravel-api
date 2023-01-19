<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->sentence(3);
            $project->slug = Str::slug($project->title, '-');
            $project->cover_image = 'placeholder/' . 'default.webp';
            $project->description = $faker->sentence(50);
            $project->difficulty = $faker->randomElement(['easy', 'medium', 'hard']);
            $project->language = $faker->randomElement(['php', 'javascript', 'html', 'css', 'c++']);
            $project->save();
        }
    }
}
