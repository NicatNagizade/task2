<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'nullable|string'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $country = Country::when($request->get('name'), function($q) use($request) {
            $q->where('name', $request->get('name'));
        })
        ->with(['companies' => function($q) {
            $q->with(['users']);
        }])
        ->get();
        return response()->json($country, 200);
    }
}
