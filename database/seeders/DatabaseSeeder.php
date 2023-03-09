<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PostCategorySeeder::class,
            UnitCategorySeeder::class,
            UserSeeder::class,
        ]);

        // \App\Models\User::factory(9)->create();
        // \App\Models\Post::factory(50)->create();
        \App\Models\Unit::factory(50)->create();
    }
}
