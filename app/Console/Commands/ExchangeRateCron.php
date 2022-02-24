<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\ExchangeRate;
use App\Models\Company;
use Config;

class ExchangeRateCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange-rate:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will run every week to fetch latest exchange rates data from http://api.exchangeratesapi.io/';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $accessUrl = Config::get('exchangerates.access_key');
        if (!$accessUrl) {
            \Log::info("ExchangeRates API's Access URL value is undefined, please check your .env!");
            return false;
        }

        // Call to Exchange Rates API
        // By default we will get from EUR as base currency
        $response = Http::get('http://api.exchangeratesapi.io/v1/latest?access_key=' . $accessUrl);

        if ($response->status() === 200) {
            $rates = $response->json('rates');
            if ($rates && count($rates) > 0) {
                // Save exchangerate in database
                $exchangeRate = new ExchangeRate();
                $exchangeRate->eur = round(1.000, 3); // Base Currency
                $exchangeRate->rub = round($rates['RUB'], 3);
                $exchangeRate->usd = round($rates['USD'], 3);
                $save = $exchangeRate->save();

                // Get all companies along with the plans
                $companies = Company::whereHas('plans')->with('plans')->get();

                \Log::info($exchangeRate);

                foreach ($companies as $company) {
                    // For each plan, recalculate based on company's primary currency
                    $companyPrimaryCurrency = strtoupper($company->primary_currency ?? '');

                    switch ($companyPrimaryCurrency) {
                        case 'EUR':
                            foreach ($company->plans as $plan) {
                                $basePrice = $plan->price_eur;
                                $plan->price_usd = round($exchangeRate->usd * $basePrice, 2);
                                $plan->price_rub = round($exchangeRate->rub * $basePrice, 0);
                                $savePlan = $plan->save();
                                if (!$savePlan) {
                                    \Log::info('ExchangeRates: Plan ID ' . $plan->id . ' failed to update, base price EUR');
                                }
                            }
                            break;
                        case 'USD':
                            foreach ($company->plans as $plan) {
                                $basePrice = $plan->price_usd;
                                $plan->price_eur = round(($exchangeRate->eur / $exchangeRate->usd) * $basePrice, 2);
                                $plan->price_rub = round(($exchangeRate->rub / $exchangeRate->usd) * $basePrice, 0);
                                $savePlan = $plan->save();
                                if (!$savePlan) {
                                    \Log::info('ExchangeRates: Plan ID ' . $plan->id . ' failed to update, base price USD');
                                }
                            }
                            break;
                        case 'RUB':
                            foreach ($company->plans as $plan) {
                                $plan->price_eur = round(($exchangeRate->eur / $exchangeRate->rub) * $basePrice, 2);
                                $plan->price_usd = round(($exchangeRate->usd / $exchangeRate->rub) * $basePrice, 2);
                                $savePlan = $plan->save();
                                if (!$savePlan) {
                                    \Log::info('ExchangeRates: Plan ID ' . $plan->id . ' failed to update, base price RUB');
                                }
                            }
                            break;
                        default:
                            \Log::info('ExchangeRates: Company ' . $company->name . '`s primary currency unset');
                            break;
                    }
                }
                \Log::info("ExchangeRates: Job Completed!");
            } else {
                \Log::info('ExchangeRates: Rates not found');
            }
        } else {
            \Log::info('ExchangeRates: API failed to fetch');
        }
    }
}
