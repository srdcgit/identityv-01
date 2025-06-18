<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function list()
    {
        $pageTitle = 'Teams';
        $teams = Team::all();
        return view('admin.team.list', compact('pageTitle', 'teams'));
    }
    public function Add()
    {
        $pageTitle = 'Add new member';
        $categories = Category::all();
        return view('admin.team.add', compact('pageTitle', 'categories'));
    }

    public function Store(Request $request)
    {
        $store = new Team();
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'specialization' => 'required',
            'permanent_address' => 'required',
            'current_address' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'joining_date' => 'required',
            'emergency_contact' => 'required',
            'status' => 'boolean',
            'designation' => 'required',
            'age' => 'required',
            'my_services' => 'required',
            'college' => 'required',
            'university' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('Teams'), $photoName);
            $store->photo = $photoName;
        }
        if ($request->hasFile('certificates')) {
            $certificates = $request->file('certificates');
            $certificatesName = time() . '_' . $certificates->getClientOriginalName();
            $certificates->move(public_path('Teams'), $certificatesName);
            $store->certificates = $certificatesName;
        }
        $store->category_id = $request->category_id;
        $store->sub_category_id = $request->sub_category_id;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->phone = $request->phone;
        $store->education = $request->education;
        $store->experience = $request->experience;
        $store->specialization = $request->specialization;
        $store->permanent_address = $request->permanent_address;
        $store->current_address = $request->current_address;
        $store->father_name = $request->father_name;
        $store->mother_name = $request->mother_name;
        $store->dob = $request->dob;
        $store->gender = $request->gender;
        $store->nationality = $request->nationality;
        $store->religion = $request->religion;
        $store->designation = $request->designation;
        $store->linkedin = $request->linkedin;
        $store->facebook = $request->facebook;
        $store->twiter = $request->twiter;
        $store->age = $request->age;
        $store->my_services = $request->my_services;
        $store->college = $request->college;
        $store->university = $request->university;
        $store->master_degree = $request->master_degree;
        $store->courses = $request->courses;
        $store->my_skills = $request->my_skills;
        $store->joining_date = $request->joining_date;
        $store->emergency_contact = $request->emergency_contact;
        $store->status = $request->input('status', 0);
        $store->description = $request->description;
        $store->save();

        $notify[] = ['success', 'Member has been created successfully'];
        return to_route('admin.team.list')->withNotify($notify);
    }

    public function edit($id)
    {
        $pageTitle = 'Edit Member';
        $edit = Team::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.team.edit', compact('edit', 'pageTitle', 'categories', 'subcategories'));
    }

    public function update(Request $request)
    {
        $update = Team::find($request->id);
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'specialization' => 'required',
            'permanent_address' => 'required',
            'current_address' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'joining_date' => 'required',
            'emergency_contact' => 'required',
            'designation' => 'required',
            'age' => 'required',
            'my_services' => 'required',
            'college' => 'required',
            'university' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('Teams'), $photoName);
            $update->photo = $photoName;
        }
        if ($request->hasFile('certificates')) {
            $certificates = $request->file('certificates');
            $certificatesName = time() . '_' . $certificates->getClientOriginalName();
            $certificates->move(public_path('Teams'), $certificatesName);
            $update->certificates = $certificatesName;
        }
        $update->category_id = $request->category_id;
        $update->sub_category_id = $request->sub_category_id;
        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->education = $request->education;
        $update->experience = $request->experience;
        $update->specialization = $request->specialization;
        $update->permanent_address = $request->permanent_address;
        $update->current_address = $request->current_address;
        $update->father_name = $request->father_name;
        $update->mother_name = $request->mother_name;
        $update->dob = $request->dob;
        $update->gender = $request->gender;
        $update->nationality = $request->nationality;
        $update->religion = $request->religion;
        $update->joining_date = $request->joining_date;
        $update->emergency_contact = $request->emergency_contact;
        $update->designation = $request->designation;
        $update->linkedin = $request->linkedin;
        $update->facebook = $request->facebook;
        $update->twiter = $request->twiter;
        $update->age = $request->age;
        $update->my_services = $request->my_services;
        $update->college = $request->college;
        $update->university = $request->university;
        $update->master_degree = $request->master_degree;
        $update->courses = $request->courses;
        $update->my_skills = $request->my_skills;
        $update->status = $request->status;
        $update->description = $request->description;
        $update->save();

        $notify[] = ['success', 'Member has been updated successfully'];
        return to_route('admin.team.list')->withNotify($notify);
    }

    public function delete(Request $request)
    {
        $delete = Team::find($request->id);
        if ($delete) {
            $delete->delete();
            $notify[] = ['success', 'Member has been Deleted successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong.'];
        return back()->withNotify($notify);
    }

    public function bookings()
    {
        $pageTitle = 'Bookings';
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->user_type === 0) {
            $bookings = Booking::with('team')->with('getUser')->orderBy('id', 'desc')->get();
        } else {
            // dd(Auth::guard('admin')->user()->id);
            $bookings = Booking::where('member_id', Auth::guard('admin')->user()->id)->where('status', 1)->orderBy('id', 'desc')->get();
            // dd($bookings);
        }
        return view('admin.booking.list', compact('pageTitle', 'bookings'));
    }
    public function editbooking($id)
    {
        $pageTitle = 'Edit Booking';
        $edit_booking = Booking::find($id);
        return view('admin.booking.edit', compact('pageTitle', 'edit_booking'));
    }
    public function updatebookings(Request $request)
    {
        $update_booking = Booking::find($request->id);
        $update_booking->status = $request->status;
        $update_booking->save();
        $notify[] = ['success', 'Booking Status Updated successfully'];
        return to_route('admin.team.bookings')->withNotify($notify);
    }
    public function updatetime(Request $request)
    {
        $updatetime = Booking::find($request->id);
        // $updatetime->user_id = Auth::id();
        // $updatetime->team_id = $request->team_id;
        $updatetime->date = $request->date;
        $updatetime->time = $request->time;
        $updatetime->approve_status = 1;
        $updatetime->save();

        $notify[] = ['success', 'Booking Reschedule Succesfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function member_approve(Request $request)
    {
        $booking = Booking::find($request->id);
        $booking -> approve_status = 1;
        $booking->save();

        $notify[] = ['success', 'Approved'];
        return redirect()->back()->withNotify($notify);
    }
}
