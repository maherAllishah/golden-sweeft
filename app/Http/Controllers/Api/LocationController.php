<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function updateLocation(Request $request)
    {
        $data =$request->validate([
            'lng' => 'required|numeric',
            'lat' => 'required|numeric',
        ]);
        Location::query()->create($data);
        return response()->json(['message' => 'Location updated successfully'], 200);
    }
}
