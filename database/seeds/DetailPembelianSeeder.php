<?php

use Illuminate\Database\Seeder;

class DetailPembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DetailPembelian::class,15)->create();
    }
}
