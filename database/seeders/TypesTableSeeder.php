<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Faker\Generator as Faker;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = config('data.types');

        
        foreach ($types as $type) {
            $newType = new Type;
            
            $newType->name = $type['name'];
            $newType->description = $type['description'];

            $newType->save();
        } 
    }
}
