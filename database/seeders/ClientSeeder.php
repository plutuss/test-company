<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory(10500)->create()->each(function ($client){
            $client->save();
            $companiesAll = Company::get();
            $companies = $companiesAll->random(2, count($companiesAll));

            foreach ($companies as $company) {
                $client->companies()->syncWithoutDetaching($company->id);
            }
        });
    }
}
