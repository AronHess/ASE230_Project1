<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // GET /countries  (list all)
    public function index()
    {
        return Country::all();
    }

    // GET /countries/{id} (get one)
    public function show($id)
    {
        return Country::findOrFail($id);
    }

    // POST /countries (create)
    public function store(Request $request)
    {
        $country = Country::create($request->all());
        return response()->json([
            "message" => "Country added successfully",
            "country" => $country
        ]);
    }

    // PUT /countries/{id} (update)
    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $country->update($request->all());

        return response()->json([
            "message" => "Country updated successfully"
        ]);
    }

    // DELETE /countries/{id} (delete)
    public function destroy($id)
    {
        Country::destroy($id);

        return response()->json([
            "message" => "Country deleted successfully"
        ]);
    }
}