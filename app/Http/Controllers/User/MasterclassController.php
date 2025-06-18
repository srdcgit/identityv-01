<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MasterClass;
use App\Models\Subcategory;
use App\Models\Upgradeplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterclassController extends Controller
{
    public function list()
    {
        $pageTitle = 'Master Class';
        $categories = Category::all();
        // $video = MasterClass::all();
        // dd($categories);
        return view('presets.themesFive.user.master-class.category', compact('categories', 'pageTitle'));
    }

    public function get_videos(Request $request)
    {
        // dd($request->all());
        $videos = MasterClass::where('title', $request->Title)->get();
        return response()->json($videos);
    }
    public function subcategories($id)
    {
        $categories = Category::find($id);
        $pageTitle = $categories->title;

        $subcategories = Subcategory::where('category_id', $id)->get();
        return view('presets.themesFive.user.master-class.subcategory', compact('pageTitle', 'subcategories', 'categories'));
    }

    public function videos($id)
    {
        $viewSubcategory = Subcategory::find($id);

        if (!$viewSubcategory) {
            return redirect()->back()->with('error', 'Subcategory not found.');
        }

        $pageTitle = $viewSubcategory->title;
        $masterclass = MasterClass::where('subcategory_id', $id)->get();
        $upgradeIds = Upgradeplan::pluck('id')->toArray();

        if (in_array(Auth::user()->is_upgrade, $upgradeIds)) {
            // User is allowed to access videos
            return view('presets.themesFive.user.master-class.view', compact('pageTitle', 'masterclass'));
        } else {
            // Show upgrade modal or redirect to upgrade page
            return redirect()->route('user.upgradeplanupgrade')
                ->with('error', 'Access denied. Please upgrade your plan to view the videos.');
        }
    }


    public function checkUpgradeStatus()
    {
        $isUpgrade = auth()->user()->is_upgrade; // Assuming 'is_upgrade' exists on the User model
        return response()->json(['is_upgrade' => $isUpgrade]);
    }
}
