<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'bg-pink-500' // Warna kreatif, identik desain
        ]);

        Category::create([
            'name' => 'IOT',
            'slug' => 'iot',
            'color' => 'bg-green-600' // Teknologi hijau identik IOT device & hardware
        ]);

        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programing',
            'color' => 'bg-blue-600' // Warna coding / programming umumnya biru tua
        ]);

        Category::create([
            'name' => 'Networking',
            'slug' => 'networking',
            'color' => 'bg-yellow-500' // Networking & connection identik kuning
        ]);

    }
}
