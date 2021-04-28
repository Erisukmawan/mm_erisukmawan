<?php

use Illuminate\Database\Seeder;

class PengajuanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PengajuanBarang::class,15)->create();
    }
}
