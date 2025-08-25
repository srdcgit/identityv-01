<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Form;
use App\Models\Plan;
use App\Models\Order;
use App\Models\Deposit;
use App\Models\Service;
use App\Lib\FormProcessor;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Lib\GoogleAuthenticator;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category2;
use App\Models\Country;
use App\Models\Entrance;
use App\Models\Institution;
use App\Models\JobScope;
use App\Models\Module;
use App\Models\Path;
use App\Models\SalaryRange;
use App\Models\State;
use App\Models\Stream;
use App\Models\Subcategory;
use App\Models\Subscription;
use App\Models\Upgradeplan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $pageTitle = 'Dashboard';
        $user = auth()->user();
        $modules = Module::orderBy('position', 'asc')->get();
        $categories = Category::all();
        $subscribe = isSubscribe($user->id);
        $totalOrders = Order::where('user_id', $user->id)->count();

        $deposits = Deposit::selectRaw("SUM(amount) as amount, MONTHNAME(created_at) as month_name, MONTH(created_at) as month_num")
            ->whereYear('created_at', date('Y'))
            ->whereStatus(1)
            ->where('user_id', $user->id)
            ->groupBy('month_name', 'month_num')
            ->orderBy('month_num')
            ->get();
        $depositsChart['labels'] = $deposits->pluck('month_name');
        $depositsChart['values'] = $deposits->pluck('amount');

        $orders = Order::with('service')->where('user_id', $user->id)
            ->latest()
            ->latest()->limit(5)->get();

        return view($this->activeTemplate . 'user.dashboard', compact('pageTitle', 'subscribe', 'totalOrders', 'user', 'depositsChart', 'orders', 'modules', 'categories'));
    }

    public function stream()
    {
        $pageTitle = 'Your Stream';
        $streams = Stream::withCount('countCategory')->with('countCategory')->get();
        return view('presets.themesFive.user.career-library.carrer_stream', compact('pageTitle', 'streams'));
    }



    public function category($id)
    {
        $stream = Stream::find($id);
        $pageTitle = $stream->name;
        $categories = Category::where('stream_id', $id)->get();
        return view('presets.themesFive.user.career-library.career_library', compact('pageTitle', 'categories'));
    }





    // public function category2($id)
    // {
    //     $category = Category::find($id);

    //     if (!$category) {
    //         abort(404, 'Category not found.');
    //     }

    //     $pageTitle = $category->title;

    //     // Get all 2nd level categories under this main category
    //     $categories2 = Category2::where('category_id', $id)->get();

    //     // Get all subcategories directly under maincategory_id
    //     $directSubcategories = Subcategory::where('maincategory_id', $id)
    //         ->whereNull('category_id') // ensure it's not tied to Category2
    //         ->get();

    //     return view('presets.themesFive.user.career-library.carrer_category2', compact(
    //         'pageTitle',
    //         'categories2',
    //         'directSubcategories',
    //         'category'
    //     ));
    // }


    public function category2($id)
    {
        $category = Category::find($id);
        if (!$category) {
            abort(404, 'Category not found.');
        }

        $pageTitle = $category->title;

        // 2nd-level categories under this main category
        $categories2 = Category2::where('category_id', $id)->get();

        // ✅ If this Category has NO Category2 → go directly to final view
        if ($categories2->isEmpty()) {
            return $this->viewSubcategoryFromCategory($category);
        }

        // Direct subcategories under this Category (not via Category2)
        $directSubcategories = Subcategory::where('maincategory_id', $id)
            ->whereNull('category_id')
            ->get();

        return view('presets.themesFive.user.career-library.carrer_category2', compact(
            'pageTitle',
            'categories2',
            'directSubcategories',
            'category'
        ));
    }

    /**
     * Treat a Category as a "terminal" item and render the same final view page.
     * Adjust FK fields if your tables use different names.
     */
    protected function viewSubcategoryFromCategory(Category $category)
    {
        $pageTitle = $category->title;

        // Make Blade happy: it expects $viewSubcategory->title/description/file
        $viewSubcategory = (object) [
            'id'          => $category->id,
            'title'       => $category->title,
            'description' => $category->description ?? null,
            'file'        => $category->file ?? null,
        ];

        // ⚠️ Use the FK your tables actually use for Category-level content.
        // From your earlier code, Category-level things used maincategory_id.
        $paths        = Path::where('category_id', $category->id)->get();
        $entrances    = Entrance::where('category_id', $category->id)->get();
        $job_scopes   = JobScope::where('category_id', $category->id)->get();
        $salary_range = SalaryRange::where('category_id', $category->id)->get();

        // Institutions (Category level). If you don’t have $category->institutions()
        // we fallback to a direct query using a Category FK (maincategory_id here).
        $baseInstitutionsQuery = method_exists($category, 'institutions')
            ? $category->institutions()
            : Institution::query()->where('category_id', $category->id);

        // IMPORTANT: use (clone $query) — not ->clone()
        $institutions = (clone $baseInstitutionsQuery)
            ->where('state_id', Auth::user()->state_id)
            ->get();

        $outside_institution = (clone $baseInstitutionsQuery)
            ->where('state_id', '!=', Auth::user()->state_id)
            ->paginate(6);

        $countries      = Country::all();
        $states         = State::all();
        $subcategory_id = $category->id; // your JS expects this id

        return view('presets.themesFive.user.career-library.view_career_library', compact(
            'viewSubcategory',
            'pageTitle',
            'paths',
            'entrances',
            'institutions',
            'outside_institution',
            'countries',
            'states',
            'subcategory_id',
            'job_scopes',
            'salary_range'
        ));
    }





    public function subcategory($id)
    {
        $category2 = Category2::find($id);

        if (!$category2) {
            abort(404, 'Category2 not found.');
        }

        $pageTitle = $category2->name ?? 'Subcategory';

        $subcategories = Subcategory::where('category_id', $id)->get();

        // ✅ No subcategories → reuse viewSubcategory() logic
        if ($subcategories->isEmpty()) {
            return $this->viewSubcategoryFromCategory2($category2);
        }

        // Otherwise → show list of subcategories
        return view(
            'presets.themesFive.user.career-library.career_library_subcat',
            compact('pageTitle', 'subcategories', 'category2')
        );
    }

    /**
     * This method mimics viewSubcategory() but works for Category2 without subcategories.
     */
    protected function viewSubcategoryFromCategory2(Category2 $category2)
    {
        $pageTitle = $category2->name;

        // 👇 Adapter so Blade sees the same shape it expects
        $viewSubcategory = (object) [
            'id'          => $category2->id,
            'title'       => $category2->name,                 // Blade uses ->title
            'description' => $category2->description ?? null,  // Blade uses ->description
            'file'        => $category2->file ?? null,         // Blade uses ->file
        ];

        // Load data keyed by Category2
        $paths         = Path::where('category2_id', $category2->id)->get();
        $entrances     = Entrance::where('category2_id', $category2->id)->get();
        $job_scopes    = JobScope::where('category2_id', $category2->id)->get();
        $salary_range  = SalaryRange::where('category2_id', $category2->id)->get();

        // Institutions by user's state / outside
        $institutionsQuery = method_exists($category2, 'institutions')
            ? $category2->institutions()
            : Institution::where('category2_id', $category2->id);

        $institutions = $institutionsQuery->clone()
            ->where('state_id', Auth::user()->state_id)->get();

        $outside_institution = $institutionsQuery->clone()
            ->where('state_id', '!=', Auth::user()->state_id)->paginate(6);

        $countries       = Country::all();
        $states          = State::all();
        $subcategory_id  = $category2->id; // keep JS happy

        return view('presets.themesFive.user.career-library.view_career_library', compact(
            'viewSubcategory',   // 👈 important
            'pageTitle',
            'paths',
            'entrances',
            'institutions',
            'outside_institution',
            'countries',
            'states',
            'subcategory_id',
            'job_scopes',
            'salary_range'
        ));
    }




    public function viewSubcategory($id)
    {
        $viewSubcategory = Subcategory::find($id);
        $pageTitle = $viewSubcategory->title ?? 'Subcategory';
        $paths = Path::where('subcategory_id', $id)->get();
        $entrances = Entrance::where('subcategory_id', $id)->get();
        $job_scopes = JobScope::where('subcategory_id', $id)->get();
        $salary_range = SalaryRange::where('subcategory_id', $id)->get();

        // Institutions related to this subcategory (inside user's state)
        $institutions = $viewSubcategory->institutions()
            ->where('state_id', Auth::user()->state_id)
            ->get();
        // dd($institutions);
        // Institutions outside user's state
        $outside_institution = $viewSubcategory->institutions()
            ->where('state_id', '!=', Auth::user()->state_id)
            ->paginate(6);
        // dd($outside_institution);   

        $countries = Country::all();
        $states = State::all();
        $subcategory_id = $id;

        return view('presets.themesFive.user.career-library.view_career_library', compact(
            'viewSubcategory',
            'pageTitle',
            'paths',
            'entrances',
            'institutions',
            'outside_institution',
            'countries',
            'states',
            'subcategory_id',
            'job_scopes',
            'salary_range'
        ));
    }


    public function viewInstitution(Request $request)
    {
        if ($request->country_id != '') {
            $institutions = Institution::where('country_id', $request->country_id)
                ->whereHas('subcategories', function ($query) use ($request) {
                    $query->where('subcategory_id', $request->subcategory_id);
                })
                ->get();
        } else {
            $institutions = Institution::where('dist_id', '!=', Auth::user()->dist_id)
                ->whereHas('subcategories', function ($query) use ($request) {
                    $query->where('subcategory_id', $request->subcategory_id);
                })
                ->get();
        }

        return response()->json($institutions);
    }

    public function viewState(Request $request)
    {
        if ($request->state_id != '') {
            $states = Institution::where('state_id', $request->state_id)
                ->whereHas('subcategories', function ($query) use ($request) {
                    $query->where('subcategory_id', $request->subcategory_id);
                })
                ->get();
        } else {
            $states = Institution::where('dist_id', '!=', Auth::user()->dist_id)
                ->whereHas('subcategories', function ($query) use ($request) {
                    $query->where('subcategory_id', $request->subcategory_id);
                })
                ->get();
        }

        return response()->json($states);
    }


    public function viewType(Request $request)
    {
        if ($request->institute_type != '') {
            $states = Institution::where('institute_type', $request->institute_type)
                ->whereHas('subcategories', function ($query) use ($request) {
                    $query->where('subcategory_id', $request->subcategory_id);
                })
                ->get();
        } else {
            $states = Institution::where('dist_id', '!=', Auth::user()->dist_id)
                ->whereHas('subcategories', function ($query) use ($request) {
                    $query->where('subcategory_id', $request->subcategory_id);
                })
                ->get();
        }

        return response()->json($states);
    }


    // subscription
    public function fetchSubscription()
    {
        $pageTitle = "Subscriptions";
        $user = auth()->user();
        $subscriptions = Subscription::with('plan')->where('user_id', $user->id)->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.subscriptions', compact('subscriptions', 'pageTitle'));
    }
}
