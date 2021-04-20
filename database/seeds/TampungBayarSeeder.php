<?php

use Illuminate\Database\Seeder;

class TampungBayarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TampungBayar::class,15)->create();
    }
}
