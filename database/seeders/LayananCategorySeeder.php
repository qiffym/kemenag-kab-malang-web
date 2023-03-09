<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LayananCategory;

class LayananCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LayananCategory::create([
            'name' => 'Pendidikan Madrasah',
            'slug' => 'pendma'
        ]);
        LayananCategory::create([
            'name' => 'Pendidikan Agama Islam',
            'slug' => 'pais'
        ]);
        LayananCategory::create([
            'name' => 'Pondok Pesantren',
            'slug' => 'pontren'
        ]);
        LayananCategory::create([
            'name' => 'Pendidikan Agama Kristen',
            'slug' => 'pakri'
        ]);
        LayananCategory::create([
            'name' => 'Pendidikan Agama Katolik',
            'slug' => 'pakat'
        ]);
        LayananCategory::create([
            'name' => 'Pendidikan Agama Hindu',
            'slug' => 'pahin'
        ]);
        LayananCategory::create([
            'name' => 'Pendidikan Agama Buddha',
            'slug' => 'pabud'
        ]);
        LayananCategory::create([
            'name' => 'Haji & Umroh',
            'slug' => 'haji'
        ]);
    }
}
