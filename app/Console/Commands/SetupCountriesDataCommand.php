<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\Currency;
use App\Models\Timezone;
use DateTime;
use DateTimeZone;
use Illuminate\Console\Command;

class SetupCountriesDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-countries-data-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = database_path('data/timezones.json');

        $json = file_get_contents($path);

        $data_timezones = json_decode($json, true);
        $data_all_timezones = $data_timezones['ALL'];
        foreach ($data_all_timezones as $timezone) {

            $date = new DateTime('now', new DateTimeZone($timezone));

            $timezone = Timezone::create([
                //'id'         => Str::uuid(),
                'name'       => $timezone,
                'utc_offset' => $date->format('P'),
            ]);
        }

        $path = database_path('data/countries.json');

        $json = file_get_contents($path);

        $data_countries = json_decode($json, true);

        foreach ($data_countries as $data_country) {

            $code = $data_country['cca2'];
            $timezones = $data_timezones[$code];

            $timezones = Timezone::whereIn('name', $timezones)->get();
            
            $currencies = $data_country['currencies'] ?? [];
            if(empty($currencies)) {
                continue;
            }
            foreach ($currencies as $code_currency => $currency) {
                $currency = Currency::firstOrCreate([
                    'code'   => $code_currency,
                ], [
                    //'id'     => Str::uuid(),
                    'name'   => $currency['name'],
                    'symbol' => $currency['symbol'],
                ]);
            }

            $currenciesModels = Currency::whereIn('code', array_keys($currencies))->get();

            $country = Country::create([
                //'id'               => Str::uuid(),
                'name'             => $data_country['name']['common'],
                'code'             => $code,
                'timezone_default' => $timezones->first()->name,
                'currency_default' => $currenciesModels->first()->code,
            ]);

            foreach ($timezones as $timezone) {
                $country->timezones()->attach($timezones);
            }

            $country->currencies()->attach($currenciesModels);
        }
    }
}
