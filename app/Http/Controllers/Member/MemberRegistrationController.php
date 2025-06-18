<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberRegistrationController extends Controller
{
    public function index()
    {
        $pageTitle = 'Member';
        $categories = Category::all();
        return view('member.team_register', compact('pageTitle','categories'));
    }

    public function Store(Request $request)
    {
        $user = new Admin();
        $user->username = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();

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
            'password' => 'required | min:6',
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
        $store->member_id = $user->id;
        $store->save();


        $notify[] = ['success', 'Member has been created successfully'];
        return to_route('admin.team.list')->withNotify($notify);
    }
    public function getSubcategory(Request $request){
        $get_subcategory = Subcategory::where('category_id', $request->category_id)->get();

        return response()->json($get_subcategory);
    }
}
