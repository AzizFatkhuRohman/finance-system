<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getCities(Request $request)
    {
        $cities = Regency::where('province_id', $request->province_id)->pluck('name', 'id');
        return response()->json($cities);
    }

    public function getDistricts(Request $request)
    {
        $regency = District::where('regency_id', $request->regency_id)->pluck('name', 'id');
        return response()->json($regency);
    }

    public function getVillages(Request $request)
    {
        $villages = Village::where('district_id', $request->district_id)->pluck('name', 'id');
        return response()->json($villages);
    }
}
