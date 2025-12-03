<?php
namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index(){ return Pet::all(); }
    public function show($id){ return Pet::findOrFail($id); }
    public function store(Request $r){
        $data = $r->validate(['name'=>'required','type'=>'required','breed'=>'nullable','age'=>'nullable|integer','owner_id'=>'nullable|exists:users,id']);
        $p = Pet::create($data);
        return response()->json($p,201);
    }
    public function update(Request $r,$id){
        $p = Pet::findOrFail($id);
        $p->update($r->all());
        return response()->json($p);
    }
    public function destroy($id){ Pet::destroy($id); return response()->json(['message'=>'Deleted']); }
}