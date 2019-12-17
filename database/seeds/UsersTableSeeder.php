<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123456'),
            'role' => '2',
          ]);

          DB::table('users')->insert([
              'name' => 'test',
              'email' => 'test@test.com',
              'password' => bcrypt('123456'),
              'role' => '1',
            ]);
    }
}
