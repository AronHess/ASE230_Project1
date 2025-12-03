<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndeedController extends Controller
{
    public function jobs(Request $r){
        $q = $r->query('q','developer');
        // Use some job API or a saved dataset; this is a proxy stub
        return response()->json(['message'=>'Use your API key to call Indeed or a stored jobs table']);
    }
}