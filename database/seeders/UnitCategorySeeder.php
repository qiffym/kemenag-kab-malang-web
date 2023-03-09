<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitCategory;

class UnitCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitCategory::create([
            'name' => 'PHU',
            'slug' => 'phu'
        ]);
        UnitCategory::create([
            'name' => 'Bimas Islam',
            'slug' => 'bimas-islam'
        ]);
        UnitCategory::create([
            'name' => 'Pendma',
            'slug' => 'pendma'
        ]);
        UnitCategory::create([
            'name' => 'PD Pontren',
            'slug' => 'pd-pontren'
        ]);
        UnitCategory::create([
            'name' => 'PAIS',
            'slug' => 'pais'
        ]);
        UnitCategory::create([
            'name' => 'Penyelenggara Syariah',
            'slug' => 'penyelenggara-syariah'
        ]);
        UnitCategory::create([
            'name' => 'Penyelenggara Kristen',
            'slug' => 'penyelenggara-kristen'
        ]);
        UnitCategory::create([
            'name' => 'Penyelenggara Katolik',
            'slug' => 'penyelenggara-katolik'
        ]);
        UnitCategory::create([

            'name' => 'Penyelenggara Hindu',
            'slug' => 'penyelenggara-hindu'
        ]);
    }
}
