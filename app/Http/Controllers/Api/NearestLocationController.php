<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class NearestLocationController extends Controller
{
    public function findNearestVendors(Request $request)
    {
        $request->validate([
            'lng' => 'required|numeric',
            'lat' => 'required|numeric',
        ]);

        $vendors = Vendor::all();

        $nearestVendor = null;
        $minDistance = PHP_INT_MAX;

        foreach ($vendors as $vendor) {
            $distance = Vendor::haversineDistance($request->lat, $request->lng, $vendor->lat, $vendor->lng);

            if ($distance < $minDistance) {
                $minDistance = $distance;
                $nearestVendor = $vendor;
            }
        }

        return response()->json([
            'nearest_vendor' => $nearestVendor,
            'distance' => $minDistance,
        ], 200);
    }
}
