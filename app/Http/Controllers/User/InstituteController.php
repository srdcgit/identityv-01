<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\Country;
use App\Models\State;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Institute';
        $institute = Institution::all()->groupBy('is_top');
        $countries = Country::all();
        $states = State::all();

        return view('presets.themesFive.user.Institue.Institute', compact('pageTitle','institute','countries','states'));
    }

    public function country(Request $request)
    {
        $institute = Institution::where('country_id',$request->country_id)->get();
        // dd($institute->all());
        return response()->json($institute);
    }

    public function state(Request $request)
    {
        $institute = Institution::where('state_id',$request->state_id)->get();
        // dd($request->all());
        return response()->json($institute);
    }

    public function inst_type(Request $request)
    {
        $institute = Institution::where('institute_type',$request->institute_type)->get();
        // dd($request->all());
        return response()->json($institute);
    }


}
