<?php
namespace App\Http\Controllers;

use App\Models\Trivia;
use Illuminate\Http\Request;

class TriviaController extends Controller
{
    public function index(){ return Trivia::all(); }
    public function show($id){ return Trivia::findOrFail($id); }

    public function store(Request $r){
        $data = $r->validate(['question'=>'required','answer'=>'required','category'=>'nullable','difficulty'=>'nullable']);
        $t = Trivia::create($data);
        return response()->json($t,201);
    }

    public function update(Request $r,$id){
        $t = Trivia::findOrFail($id);
        $t->update($r->all());
        return response()->json($t);
    }

    public function destroy($id){
        Trivia::destroy($id);
        return response()->json(['message'=>'Deleted']);
    }
}