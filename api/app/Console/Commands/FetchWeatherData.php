<?php

namespace App\Console\Commands;

use App\Jobs\FetchWeatherData as JobsFetchWeatherData;
use Illuminate\Console\Command;

class FetchWeatherData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:weather-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches all users and updates their weather information';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        JobsFetchWeatherData::dispatch();
    }
}
