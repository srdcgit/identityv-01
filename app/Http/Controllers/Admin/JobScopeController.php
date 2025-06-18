<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category2;
use App\Models\JobScope;
use App\Models\Stream;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class JobScopeController extends Controller
{
    public function list(){
        $pageTitle = 'Job Scopes';
        $job_scopes = JobScope::with('getCategory','getStream','getSubcategory')->get();
        return view('admin.job-scope.list', compact('pageTitle','job_scopes'));
    }
    public function add(){
        $pageTitle = 'Add Job Scopes';
        $streams = Stream::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.job-scope.add', compact('pageTitle', 'streams', 'categories', 'subcategories'));
    }
    public function store(Request $request){
        $store = new JobScope();
        $store->stream_id = $request->stream_id;
        $store->category_id = $request->category_id;
        $store->category2_id = $request->category2_id;
        $store->subcategory_id = $request->subcategory_id;
        $store->name = $request->name;
        $store->save();
        $notify[] = ['success', 'Job Scope has been created successfully'];
        return to_route('admin.jobscope.list')->withNotify($notify);
    }
    public function edit($id){
        $pageTitle = 'Edit Job Scopes';
        $edit = JobScope::find($id);
        $streams = Stream::all();
        $categories = Category::all();
        $category2 = Category2::all();
        $subcategories = Subcategory::all();
        return view('admin.job-scope.edit', compact('pageTitle','edit','streams','categories','category2', 'subcategories'));
    }
    public function update(Request $request){
        $update = JobScope::find($request->id);
        $update->stream_id = $request->stream_id;
        $update->category_id = $request->category_id;
        $update->category2_id = $request->category2_id;
        $update->subcategory_id = $request->subcategory_id;
        $update->name = $request->name;
        $update->save();
        $notify[] = ['success', 'Job Scope has been updated successfully'];
        return to_route('admin.jobscope.list')->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = JobScope::find($request->id);
        if($delete){
            $delete->delete();
            $notify[] = ['success', 'Deleted Successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong...'];
        return back()->withNotify($notify);
    }
}
