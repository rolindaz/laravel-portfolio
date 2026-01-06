<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i=0; $i<10; $i++){
            $newProject = new Project;
            $newProject->title = $faker->sentence();
            $newProject->category = $faker->word();
            $newProject->tech = $faker->word();
            $newProject->save();
        }
    }
}
