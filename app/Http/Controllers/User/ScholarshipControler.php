<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScholarshipControler extends Controller
{
    // public function index()
    // {
    //     $pageTitle = 'Scholarship';
    //     $scholarship = Scholarship::orderBy('id','asc')->get();
    //     return view('presets.themesFive.user.scholarship.scholarship', compact('pageTitle','scholarship'));

    // }

    // public function getType(Request $request)
    // {
    //     $getType = Scholarship::where('type', $request->type)->get();
    //     return response()->json($getType);
    // }

    // public function getClass(Request $request)
    // {
    //     $getClass = Scholarship::where('class', $request->classes)->get();
    //     return response()->json($getClass);
    // }
    public function index()
    {
        $pageTitle = 'Scholarship';
        $scholarship = Scholarship::orderBy('id', 'asc')->get();

        // Fetch user data for upgrade status and plan name
        $isUpgrade = Auth::user()->is_upgrade; // Assuming you're using Auth for user login
        $planName = Auth::user()->plan_name;

        return view('presets.themesFive.user.scholarship.scholarship', compact('pageTitle', 'scholarship', 'isUpgrade', 'planName'));
    }

    public function getType(Request $request)
    {
        $query = Scholarship::where('type', $request->type);
        if (!$request->input('is_upgrade')) {
            $query->where('is_free', true);
        }
        return response()->json($query->get());
    }

    public function getClass(Request $request)
    {
        $query = Scholarship::where('class', $request->classes);
        if (!$request->input('is_upgrade')) {
            $query->where('is_free', true);
        }
        return response()->json($query->get());
    }
}
