<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
     public function run()
     {
         Category::create(['name' => 'Laravel']);
         Category::create(['name' => 'PHP']);
         Category::create(['name' => 'Javascript']);
         Category::create(['name' => 'Python']);
     }
}
