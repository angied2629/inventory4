<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categori;

class CategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categori::Factory(5)->create();        
    }
}
