<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags = [
            'Web Design',
            'UX',
            'UI',
            'Frontend',
            'Backend',
            'Fullstack',
            'JavaScript',
            'PHP',
            'Laravel',
            'React',
            'Vue.js',
            'HTML',
            'CSS',
            'API',
            'DevOps',
            'Database',
            'MySQL',
            'Git',
            'Agile',
            'Testing'
        ];
        foreach($tags as $tag) {
            $newTag = new Tag;

            $newTag->name = $tag;
            $newTag->description = $faker->sentence();
            $newTag->color = $faker->colorName();
            
            $newTag->save();
        }
    }
}
