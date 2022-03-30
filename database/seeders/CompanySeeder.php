<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company;
        $company->name = 'company1';
        $company->country_id = 1;
        $company->save();
        $company->users()->attach(1, [
            'connected_date' => now()
        ]);
        $company->users()->attach(2, [
            'connected_date' => now()
        ]);
        $company->users()->attach(3, [
            'connected_date' => now()
        ]);
        $company->users()->attach(4, [
            'connected_date' => now()
        ]);

        $company = new Company;
        $company->name = 'company2';
        $company->country_id = 1;
        $company->save();
        $company->users()->attach(1, [
            'connected_date' => now()
        ]);
        $company->users()->attach(3, [
            'connected_date' => now()
        ]);

        $company = new Company;
        $company->name = 'company3';
        $company->country_id = 1;
        $company->save();
        $company->users()->attach(2, [
            'connected_date' => now()
        ]);
        $company->users()->attach(3, [
            'connected_date' => now()
        ]);
    }
}
