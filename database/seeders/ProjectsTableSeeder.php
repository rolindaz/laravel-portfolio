<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('data.projects');

        foreach($projects as $project) {
            $newProject = new Project;

            $newProject->type_id = $project['type_id'];
            $newProject->title = $project['title'];
            $newProject->overview = $project['overview'];
            $newProject->repo_link = $project['repo_link'];
            $newProject->view_link = $project['view_link'];
            $newProject->image = $project['image'];

            $newProject->save();
        }
    }
}
