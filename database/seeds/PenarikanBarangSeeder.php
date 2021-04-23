<?php

use Illuminate\Database\Seeder;

class PenarikanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PenarikanBarang::class,15)->create();
    }
}
