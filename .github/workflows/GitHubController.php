<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GithubController extends Controller
{
    // GET /api/github/user  (protected)
    public function user(Request $r){
        $token = $r->user()->github_token ?? null;
        if(!$token) return response()->json(['message'=>'No GitHub token stored'],403);
        $res = Http::withToken($token)->get('https://api.github.com/user');
        return $res->json();
    }

    public function repos(Request $r){
        $token = $r->user()->github_token ?? null;
        if(!$token) return response()->json(['message'=>'No GitHub token stored'],403);
        $res = Http::withToken($token)->get('https://api.github.com/user/repos');
        return $res->json();
    }
}