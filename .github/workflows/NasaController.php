<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NasaController extends Controller
{
    public function apod(Request $r){
        $key = env('NASA_API_KEY');
        $res = Http::get('https://api.nasa.gov/planetary/apod', ['api_key'=>$key]);
        return $res->json();
    }
}
