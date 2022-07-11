<?php

namespace Database\Seeders;

use App\Models\TaxIdentificator;
use Illuminate\Database\Seeder;

class TaxIdentificatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxIdentificator::factory()->times(20)->create();
    }
}
