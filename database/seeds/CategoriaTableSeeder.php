<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('categoria_users')->insert([
            'tipoUser' => 'Administrador'
        ]);
          DB::table('categoria_users')->insert([
            'tipoUser' => 'Bodeguero'
        ]);
    }
}
