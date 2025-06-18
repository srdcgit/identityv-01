<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category2;
use App\Models\Entrance;
use App\Models\Module;
use App\Models\Stream;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class EntranceController extends Controller
{
    public function list(){
        $pageTitle = 'Entrance Exam';
        $entrances = Entrance::with('Module','Category','Subcategory')->orderBy('created_at','desc')->paginate(getPaginate());
        return view('admin.entrance-exam.list', compact('pageTitle','entrances'));
    }
    public function add(){
        $pageTitle = 'Add Entrance Exam';
        $modules = Module::all();
        $streams = Stream::all();
        return view('admin.entrance-exam.add', compact('pageTitle','streams','modules'));
    }
    public function store(Request $request){
        $store = new Entrance();
        $store->module_id = $request->module_id;
        $store->stream_id = $request->stream_id;
        $store->category_id = $request->category_id;
        $store->category2_id = $request->category2_id;
        $store->subcategory_id = $request->subcategory_id;
        $store->exam_name = $request->exam_name;
        $store->issue_date = $request->issue_date;
        $store->last_date = $request->last_date;
        $store->url = $request->url;

        $store->save();

        $notify[] = ['success', 'Entrance Exam has been created successfully'];
        return to_route('admin.entrance.list')->withNotify($notify);
    }
    public function edit($id){
        $pageTitle = 'Edit Entrance Exam';
        $modules = Module::all();
        $streams = Stream::all();
        $categories = Category::all();
        $category2 = Category2::all();
        $subcategories = Subcategory::all();
        $edit = Entrance::find($id);
        return view('admin.entrance-exam.edit', compact('pageTitle','edit','categories','subcategories','modules', 'streams', 'category2'));
    }
    public function update(Request $request){
        $update = Entrance::find($request->id);

        $update->module_id = $request->module_id;
        $update->stream_id = $request->stream_id;
        $update->category_id = $request->category_id;
        $update->category2_id = $request->category2_id;
        $update->subcategory_id = $request->subcategory_id;
        $update->exam_name = $request->exam_name;
        $update->issue_date = $request->issue_date;
        $update->last_date = $request->last_date;
        $update->url = $request->url;

        $update->save();
        $notify[] = ['success', 'Entrance Exam has been created successfully'];
        return to_route('admin.entrance.list')->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = Entrance::find($request->id);

        $delete->delete();

        $notify[] = ['success', 'Entrance Exam has been deleted successfully'];
        return back()->withNotify($notify);
    }
}
