<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Upgradeplan;
use Illuminate\Http\Request;

class UpgradePlanController extends Controller
{
    public function upgrade()
    {
        $pageTitle = 'Upgrade Plan';
        $upgrades = Upgradeplan::with('getmodel')->get();
        // dd($upgrades);
        return view('presets.themesFive.user.upgrade', compact('pageTitle','upgrades'));
    }

    public function thankyou()
    {
        $pageTitle = 'ThankYou';
        return view('presets.themesFive.user.upgradethankyou', compact('pageTitle'));
    }
}
