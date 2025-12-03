<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    public function search(Request $r){
        $q = $r->query('q','');
        if(!$q) return response()->json(['message'=>'q required'],400);
        $token = $r->user()->spotify_token ?? null;
        if(!$token) return response()->json(['message'=>'No Spotify token stored'],403);
        $res = Http::withToken($token)->get('https://api.spotify.com/v1/search', ['q'=>$q,'type'=>'track,artist']);
        return $res->json();
    }

    public function playlists(Request $r){
        $token = $r->user()->spotify_token ?? null;
        if(!$token) return response()->json(['message'=>'No Spotify token stored'],403);
        $res = Http::withToken($token)->get('https://api.spotify.com/v1/me/playlists');
        return $res->json();
    }
}