<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostCategory::create([
            'name' => 'Umum',
            'slug' => 'umum'
        ]);
        PostCategory::create([
            'name' => 'Pendidikan Madrasah',
            'slug' => 'pendidikan-madrasah'
        ]);
        PostCategory::create([
            'name' => 'Kepegawaian',
            'slug' => 'kepegawaian'
        ]);
        PostCategory::create([
            'name' => 'Keuangan',
            'slug' => 'keuangan'
        ]);
        PostCategory::create([
            'name' => 'Bimas Islam',
            'slug' => 'bimas-islam'
        ]);
        PostCategory::create([
            'name' => 'Penyelenggara Katolik',
            'slug' => 'penyelenggara-katolik'
        ]);
        PostCategory::create([
            'name' => 'Penyelenggara Kristen',
            'slug' => 'penyelenggara-kristen'
        ]);
        PostCategory::create([
            'name' => 'Pondok Pesantren',
            'slug' => 'pontren'
        ]);
        PostCategory::create([
            'name' => 'Pendidikan Agama Islam',
            'slug' => 'pendidikan-agama-islam'
        ]);

        PostCategory::create([
            'name' => 'Haji & Umrah',
            'slug' => 'haji-dan-umrah'
        ]);
        PostCategory::create([
            'name' => 'Binsyar',
            'slug' => 'binsyar'
        ]);
        PostCategory::create([
            'name' => 'Penyelenggara Hindu',
            'slug' => 'penyelenggara-hindu'
        ]);
    }
}
