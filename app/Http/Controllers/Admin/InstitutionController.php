<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category2;
use App\Models\Country;
use App\Models\District;
use App\Models\Institution;
use App\Models\Module;
use App\Models\State;
use App\Models\Stream;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function list()
    {
        $pageTitle = 'Institutions';
        $institutions = Institution::with('Modules','Category','Subcategory','Country','State','Dist')->get();
        return view('admin.institution.list', compact('pageTitle', 'institutions'));
    }
    public function add()
    {
        $pageTitle = 'Add Institutions';
        $modules = Module::all();
        $streams = Stream::all();
        $countries = Country::all();
        return view('admin.institution.add', compact('pageTitle', 'countries', 'streams','modules'));
    }
    public function store(Request $request)
    {
        $store = new Institution;

        $store->module_id = $request->module_id;
        $store->stream_id = $request->stream_id;
        $store->category_id = $request->category_id;
        $store->category2_id = $request->category2_id;
        $store->subcategory_id = $request->subcategory_id;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('institution'), $fileName);
            $store->logo = $fileName;
        }
        $store->name = $request->name;
        $store->address = $request->address;
        $store->admission_process = $request->admission_process;
        $store->tentative_date = $request->tentative_date;
        $store->institute_type = $request->institute_type;
        $store->url = $request->url;
        $store->country_id = $request->country_id;
        $store->state_id = $request->state_id;
        $store->dist_id = $request->dist_id;
        $store->is_top = $request->is_top;
        $store->save();

        $notify[] = ['success', 'Institution has been created successfully'];
        return to_route('admin.institution.list')->withNotify($notify);
    }
    public function Edit($id){
        $pageTitle = 'Edit Institutions';
        $modules = Module::all();
        $streams = Stream::all();
        $categories = Category::all();
        $category2 = Category2::all();
        $subcategories = Subcategory::all();
        $countries = Country::all();
        $states = State::all();
        $districts = District::all();
        $edit = Institution::find($id);
        return view('admin.institution.edit', compact('pageTitle','edit','categories','streams','category2', 'countries','subcategories','states','districts','modules'));
    }
    public function update(Request $request){
        $update = Institution::find($request->id);

        $update->module_id = $request->module_id;
        $update->category_id = $request->category_id;
        $update->subcategory_id = $request->subcategory_id;
        if ($request->hasFile('logo')) {
            if ($update->logo && file_exists(public_path('institution/' . $update->logo))) {
                unlink(public_path('institution/' . $update->logo));
            }
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('institution'), $fileName);
            $update->logo = $fileName;
        }
        $update->name = $request->name;
        $update->address = $request->address;
        $update->admission_process = $request->admission_process;
        $update->tentative_date = $request->tentative_date;
        $update->institute_type = $request->institute_type;
        $update->url = $request->url;
        $update->country_id = $request->country_id;
        $update->state_id = $request->state_id;
        $update->dist_id = $request->dist_id;
        $update->is_top = $request->is_top;
        $update->save();

        $notify[] = ['success', 'Institution has been updated successfully'];
        return to_route('admin.institution.list')->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = Institution::find($request->id);
        if($delete){
            if($delete->logo && file_exists(public_path('institution/'. $delete->logo))){
                unlink(public_path('institution/'. $delete->logo));
            }
            $delete->delete();
            $notify[] = ['success', 'Institution has been deleted successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['errors', 'Something Wents Wrong..'];
        return back()->withNotify($notify);
    }
}
