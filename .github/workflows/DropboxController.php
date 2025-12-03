<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DropboxController extends Controller
{
    public function listFiles(Request $r){
        $token = env('DROPBOX_TOKEN'); // or user token
        $res = Http::withToken($token)->post('https://api.dropboxapi.com/2/files/list_folder', ['path'=>'']);
        return $res->json();
    }
}