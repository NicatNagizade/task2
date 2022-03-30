<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'nullable|string'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $users = User::when($request->get('name'), function ($q) use ($request) {
            $q->whereHas('companies.country', function ($q) use ($request) {
                $q->where('name', $request->get('name'));
            });
        })
            ->with(['companies.country'])
            ->get();
        return response()->json($users, 200);
    }
}
