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
        $streams = Stream::withCount('countCategory')->get();
        return view('presets.themesFive.user.career-library.carrer_stream', compact('pageTitle', 'streams'));
    }
    public function category($id)
    {
        $stream = Stream::find($id);
        $pageTitle = $stream->name;
        $categories = Category::where('stream_id', $id)->get();
        return view('presets.themesFive.user.career-library.career_library', compact('pageTitle', 'categories'));
    }
    public function category2($id)
    {
        $category = Category::find($id);
        $pageTitle = $category->title;
        $categories2 = Category2::where('category_id', $id)->get();
        return view('presets.themesFive.user.career-library.carrer_category2', compact('pageTitle', 'categories2'));
    }

    public function subcategory($id)
    {

        $categories = Category2::find($id);
        $pageTitle = $categories->title;

        $subcategories = Subcategory::where('category_id', $id)->get();
        return view('presets.themesFive.user.career-library.career_library_subcat', compact('pageTitle', 'subcategories', 'categories'));
    }

    public function viewSubcategory($id)
    {
        $viewSubcategory = Subcategory::find($id);
        $pageTitle = $viewSubcategory->title;
        $paths = Path::where('subcategory_id', $id)->get();
        $entrances = Entrance::where('subcategory_id', $id)->get();
        $job_scopes = JobScope::where('subcategory_id', $id)->get();
        $salary_range = SalaryRange::where('subcategory_id', $id)->get();
        $institutions = Institution::where('subcategory_id', $id)->where('state_id', Auth::user()->state_id)->get();
        $outside_institution = Institution::where('subcategory_id', $id)->where('state_id', '!=', Auth::user()->state_id)->paginate(6);
        $countries = Country::all();
        $states = State::all();
        $subcategory_id = $id;

        return view('presets.themesFive.user.career-library.view_career_library', compact('viewSubcategory', 'pageTitle', 'paths', 'entrances', 'institutions', 'outside_institution', 'countries', 'states', 'subcategory_id', 'job_scopes', 'salary_range'));
    }

    public function viewInstitution(Request $request)
    {
        if ($request->country_id != '') {
            $institutions = Institution::where('country_id', $request->country_id)
                ->where('subcategory_id', $request->subcategory_id)
                ->get();
        } else {

            $institutions = Institution::where('subcategory_id', $request->subcategory_id)->where('dist_id', '!=', Auth::user()->dist_id)->get();
        }

        return response()->json($institutions);
    }

    public function viewState(Request $request)
    {
        if ($request->state_id != '') {
            $states = Institution::where('state_id', $request->state_id)
                ->where('subcategory_id', $request->subcategory_id)
                ->get();
        } else {

            $states = Institution::where('subcategory_id', $request->subcategory_id)->where('dist_id', '!=', Auth::user()->dist_id)->get();
        }

        return response()->json($states);
    }

    public function viewType(Request $request)
    {
        if ($request->institute_type != '') {
            $states = Institution::where('institute_type', $request->institute_type)
                ->where('subcategory_id', $request->subcategory_id)
                ->get();
        } else {

            $states = Institution::where('subcategory_id', $request->subcategory_id)->where('dist_id', '!=', Auth::user()->dist_id)->get();
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
