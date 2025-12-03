<?php
namespace App\Http\Controllers;

use App\Models\WeatherRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    // Simple current weather proxy (uses e.g. openweathermap API key in .env)
    public function current(Request $r){
        $city = $r->query('city','');
        $key = env('OPENWEATHER_API_KEY');
        if(!$city) return response()->json(['message'=>'city required'],400);
        $res = Http::get('https://api.openweathermap.org/data/2.5/weather', ['q'=>$city,'appid'=>$key,'units'=>'metric']);
        // optional caching
        WeatherRecord::create(['city'=>$city,'payload'=>$res->body()]);
        return $res->json();
    }

    public function forecast(Request $r){
        $city = $r->query('city','');
        $key = env('OPENWEATHER_API_KEY');
        if(!$city) return response()->json(['message'=>'city required'],400);
        $res = Http::get('https://api.openweathermap.org/data/2.5/forecast', ['q'=>$city,'appid'=>$key,'units'=>'metric']);
        WeatherRecord::create(['city'=>$city,'payload'=>$res->body()]);
        return $res->json();
    }
}