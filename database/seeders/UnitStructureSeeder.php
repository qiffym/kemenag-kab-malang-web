<?php

namespace Database\Seeders;

use App\Models\UnitStructure;
use Illuminate\Database\Seeder;

class UnitStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitStructure::create([
            'unit_category_id' => '1',
            'title' => 'Struktur Organisasi PHU',
            'image_path' => '',
        ]);
        UnitStructure::create([
            'unit_category_id' => '2',
            'title' => 'Struktur Organisasi Bimas Islam',
            'image_path' => 'bi.jpg',
        ]);
        UnitStructure::create([
            'unit_category_id' => '3',
            'title' => 'Struktur Organisasi Pendma',
            'image_path' => 'pendma.jpg',
        ]);
        UnitStructure::create([
            'unit_category_id' => '4',
            'title' => 'Struktur Organisasi PD Pontren',
            'image_path' => '',
        ]);
        UnitStructure::create([
            'unit_category_id' => '5',
            'title' => 'Struktur Organisasi PAIS',
            'image_path' => 'pais.jpg',
        ]);
        UnitStructure::create([
            'unit_category_id' => '6',
            'title' => 'Struktur Organisasi Peny Syariah',
            'image_path' => '',
        ]);
        UnitStructure::create([
            'unit_category_id' => '7',
            'title' => 'Struktur Organisasi Peny Kristen',
            'image_path' => 'peny-kristen.jpg',
        ]);
        UnitStructure::create([
            'unit_category_id' => '8',
            'title' => 'Struktur Organisasi Peny Katolik',
            'image_path' => 'peny-katolik.jpg',
        ]);
        UnitStructure::create([
            'unit_category_id' => '9',
            'title' => 'Struktur Organisasi Peny Hindu',
            'image_path' => '',
        ]);
        UnitStructure::create([
            'unit_category_id' => '10',
            'title' => 'Struktur Organisasi Urusan Umum',
            'image_path' => '',
        ]);
        UnitStructure::create([
            'unit_category_id' => '10',
            'title' => 'Struktur Organisasi Urusan Kepegawaian',
            'image_path' => '',
        ]);
        UnitStructure::create([
            'unit_category_id' => '10',
            'title' => 'Struktur Organisasi Urusan Keuangan',
            'image_path' => 'keuangan.jpg',
        ]);
    }
}
