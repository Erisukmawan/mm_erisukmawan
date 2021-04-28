<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PemasokSeeder::class);
        // $this->call(PenarikanSeeder::class);
         //$this->call(BarangSeeder::class);
         //$this->call(UserSeeder::class);
        //  $this->call(PengajuanBarangSeeder::class);
        //  $this->call(ProdukSeeder::class);
        // $this->call(PembelianSeeder::class);
        //  $this->call(DetailPembelianSeeder::class);
        // $this->call(PenjualanSeeder::class);
        // $this->call(TampungBayarSeeder::class);
        // $this->call(DetailPenjualanSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(PelangganSeeder::class);
        // factory(App\Penjualan::class,5)->create();
        // factory(App\DetailPenjualan::class,10)->create();
        factory(App\User::class,1)->create();
    }
}
