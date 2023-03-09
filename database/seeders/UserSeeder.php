<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    \App\Models\User::create([
      'role_id' => 1,
      'name' => 'Humas01',
      'email' => 'inmaskabmalang@gmail.com',
      'password' => bcrypt('12345'),
      'phoneNumber' => '085100695056',
    ]);
    \App\Models\User::create([
      'role_id' => 1,
      'name' => 'Lazirrizal',
      'email' => 'lazirrizal12345@gmail.com',
      'password' => bcrypt('12345'),
      'phoneNumber' => '082332820631',
    ]);
    \App\Models\User::create([
      'role_id' => 1,
      'name' => 'Rudi Muryanta',
      'email' => 'r4dimu@gmail.com',
      'password' => bcrypt('12345'),
      'phoneNumber' => '085855087788',
    ]);
    \App\Models\User::create([
      'role_id' => 1,
      'name' => 'RAKHMAT HIDAYAT, SH., M.Si.',
      'email' => 'bo.pontren.kabmalang@gmail.com',
      'password' => bcrypt('12345'),
      'phoneNumber' => '082330639163',
    ]);
    \App\Models\User::create([
      'role_id' => 1,
      'name' => '	MUH. NURDIANTO RAHMADDIEN',
      'email' => 'rahmaddien@gmail.com',
      'password' => bcrypt('12345'),
      'phoneNumber' => '081944822823',
    ]);
    \App\Models\User::create([
      'role_id' => 1,
      'name' => 'Qiff Ya',
      'email' => 'qiww.dev@gmail.com',
      'password' => bcrypt('password'),
      'phoneNumber' => '081237779201',
    ]);
  }
}
