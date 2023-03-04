<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenWeatherMap
{
    private $apiKey;
    private $baseURL;

    public function __construct()
    {
        $this->baseURL = config('openweathermap.base_url');
        $this->apiKey =  config('openweathermap.api_key');
     
    }

    public function getWeather(float $lon, float $lat, int $userId = 0)
    {
        $path = "weather?lat=$lat&lon=$lon&appid=$this->apiKey";
        if (Cache::has($lon . $lat . $userId)) {
            return Cache::get($lon . $lat . $userId);
        }
        return Cache::remember($lon . $lat . $userId, config('cache.duration'), function () use ($path) {
            $response = Http::get($this->baseURL.$path);
            if($response->successful()) {
                return  $response->json();
            }
            
        });
    }
}
