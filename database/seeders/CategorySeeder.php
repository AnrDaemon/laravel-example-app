<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::firstOrCreate(['name' => 'Coniferous']);
        Category::firstOrCreate(['name' => 'Deciduous']);
        Category::firstOrCreate(['name' => 'Evergreen']);
    }
}
