<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'idCategoria' => '1',
            'user' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
            DB::table('users')->insert([
            'idCategoria' => '2',
            'user' => 'bodega',
            'password' => bcrypt('1234'),
        ]);
    }
}
