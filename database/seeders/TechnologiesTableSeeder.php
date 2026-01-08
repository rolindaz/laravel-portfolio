<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = config('data.technologies');
        
        foreach ($technologies as $tech) {
            $newTech = new Technology;
            
            $newTech->name = $tech['name'];
            $newTech->description = $tech['description'];
            $newTech->icon = $tech['icon'];

            $newTech->save();
        } 
    }
}
