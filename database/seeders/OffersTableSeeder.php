<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Offer::factory(10)->create(); // 10 is the number of test data to create
    }
}

