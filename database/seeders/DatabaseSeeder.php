<?php

namespace Database\Seeders;

use App\Models\Country;
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
        $this->writeCountries();
        // \App\Models\User::factory(10)->create();
    }

    private function writeCountries()
    {
        $countries = [
            [
                'country_code' => 'ru',
                'currency_code' => 'rub',
                'name' => 'Russia',
            ],
            [
                'country_code' => 'ee',
                'currency_code' => 'eur',
                'name' => 'Estonia',
            ],
            [
                'country_code' => 'lv',
                'currency_code' => 'usd',
                'name' => 'Latvia',
            ],
            [
                'country_code' => 'aw',
                'currency_code' => 'usd',
                'name' => 'Netherlands',
            ],
            [
                'country_code' => 'ua',
                'currency_code' => 'usd',
                'name' => 'Ukraine',
            ],
            [
                'country_code' => 'de',
                'currency_code' => 'eur',
                'name' => 'Germany',
            ],
            [
                'country_code' => 'ax',
                'currency_code' => 'usd',
                'name' => 'Finland',
            ],
            [
                'country_code' => 'fr',
                'currency_code' => 'usd',
                'name' => 'France',
            ],
            [
                'country_code' => 'be',
                'currency_code' => 'usd',
                'name' => 'Belarus',
            ],
            [
                'country_code' => 'us',
                'currency_code' => 'usd',
                'name' => 'USA',
            ],
            [
                'country_code' => 'md',
                'currency_code' => 'usd',
                'name' => 'Moldova',
            ],
            [
                'country_code' => 'ch',
                'currency_code' => 'usd',
                'name' => 'Switzerland',
            ],
            [
                'country_code' => 'lt',
                'currency_code' => 'usd',
                'name' => 'Lithuania',
            ],
            [
                'country_code' => 'au',
                'currency_code' => 'usd',
                'name' => 'Australia',
            ],
            [
                'country_code' => 'gb',
                'currency_code' => 'usd',
                'name' => 'UK',
            ],
        ];

        Country::query()
            ->insert($countries);
    }
}
