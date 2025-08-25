<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Mysession;
use App\Models\Subcategory;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MysessionController extends Controller
{
    public function index()
    {
        $pageTitle = 'My Session';
        $mysession = Team::all();
        $category = Category::all();
        return view('presets.themesFive.user.my-sessions.team', compact('pageTitle','mysession','category'));
    }

    public function get_team_by_category(Request $request)
    {
        $category = Team::where('category_id',$request->cat_id)->get();
        $subcategory = Subcategory::where('category_id',$request->cat_id)->get();
        return response()->json([
            'category' => $category,
            'subcategory' => $subcategory,
        ]);
    }

    public function get_team_by_subcategory(Request $request)
    {
        $subcategory = Team::where('sub_category_id',$request->subcat_id)->get();
        return response()->json($subcategory);
    }

    public function get_team(Request $request){
        $get_team = Team::where('name', $request->name)->get();
        return response()->json($get_team);
    }
    public function viewTeam($id){
        $pageTitle = 'View Team';
        $view_team = Team::find($id);
        $bookings = Booking::where('team_id', $id)->where('user_id', Auth::user()->id)->with('team')->orderBy('id','DESC')->get();
        $booking = Booking::where('team_id', $id)->where('user_id', Auth::user()->id)->first();
        // dd($bookings);
        return view('presets.themesFive.user.my-sessions.view_team', compact('view_team','pageTitle','bookings','booking'));
    }

    public function storeBooking(Request $request)
    {
        $storeBooking = New Booking();
        $storeBooking->user_id = Auth::id();
        $storeBooking->team_id = $request->team_id;
        $storeBooking->member_id = $request->member_id;
        $storeBooking->date = $request->date;
        $storeBooking->time = $request->time;
        $storeBooking->save();

        $notify[] = ['success', 'Booking Succesfully Done'];
        return redirect()->route('user.mysession.team_pay',$request->team_id)->withNotify($notify);
    }



    public function team_pay($id)
    {
        $pageTitle = 'Payment';
        $bookings = Booking::where('team_id', $id)->where('user_id', Auth::user()->id)->with('team')->orderBy('id','DESC')->get();
        $booking = Booking::where('team_id', $id)->where('user_id', Auth::user()->id)->first();
        return view('presets.themesFive.user.my-sessions.team_pay', compact('pageTitle','bookings','booking'));
    }
    public function thankyou($id)
    {
        $pageTitle = 'ThankYou';
        return view('presets.themesFive.user.my-sessions.thankyou', compact('pageTitle','id'));
    }
}
