<?php

namespace Database\Seeders;
use App\Models\Gallerie;

use Illuminate\Database\Seeder;

class GallerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallerie::factory(10)->create();
    }
}
