<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function towns(?Province $province = null)
    {
        $towns = County::where('province_id', $province->id)->get();

        return response()->json(compact('towns'));
    }

    public function districts(?County $town = null)
    {
        $districts = District::where('county_id', $town->id)->get();

        return response()->json(compact('districts'));
    }
}
