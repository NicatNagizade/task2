<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new Country;
        $country->name = 'Canada';
        $country->save();

        $country = new Country;
        $country->name = 'Azerbaijan';
        $country->save();

        $country = new Country;
        $country->name = 'Italy';
        $country->save();
    }
}
